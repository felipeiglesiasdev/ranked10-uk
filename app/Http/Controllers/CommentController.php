<?php

namespace App\Http\Controllers;

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Comment; // IMPORTA O MODEL DE COMENTARIOS
use App\Services\FiltroDeComentario; // IMPORTA O FILTRO DE SPAM
use App\Services\Turnstile; // IMPORTA A VERIFICACAO DO CAPTCHA
use Illuminate\Http\JsonResponse; // IMPORTA O TIPO DE RETORNO DO ENDPOINT DE TOKEN
use Illuminate\Http\RedirectResponse; // IMPORTA O TIPO DE RETORNO DO STORE
use Illuminate\Http\Request; // IMPORTA A REQUISICAO HTTP
use Illuminate\Support\Facades\Crypt; // IMPORTA A CRIPTOGRAFIA (CARIMBO DE TEMPO DO FORMULARIO)
use Illuminate\Support\Facades\RateLimiter; // IMPORTA O LIMITADOR DE FREQUENCIA
use Illuminate\Support\Facades\Validator; // IMPORTA O VALIDADOR (PRECISAMOS DA INSTANCIA PARA CONTROLAR O REDIRECT)
use Illuminate\Validation\ValidationException; // IMPORTA A EXCECAO DE VALIDACAO

class CommentController extends Controller
{
    public function __construct(
        private readonly FiltroDeComentario $filtro, // FILTRO DE SPAM INJETADO PELO CONTAINER
        private readonly Turnstile $turnstile, // VERIFICADOR DO CAPTCHA INJETADO PELO CONTAINER
    ) {
    }

    public function token(): JsonResponse // DEVOLVE UM TOKEN CSRF FRESCO PARA O FORMULARIO
    {
        // POR QUE ESTE ENDPOINT EXISTE: O HTML DO ARTIGO PODE SER SERVIDO DE CACHE (CLOUDFLARE) OU
        // FICAR ABERTO NUMA ABA POR HORAS. NOS DOIS CASOS O _token EMBUTIDO NA PAGINA ENVELHECE E O
        // ENVIO MORRERIA COM 419. O JAVASCRIPT DOS COMENTARIOS BUSCA UM TOKEN NOVO NA HORA DE ENVIAR.
        return response()->json(['token' => csrf_token()])->header('Cache-Control', 'no-store, private'); // NUNCA CACHEAR ESTA RESPOSTA
    }

    public function store(Request $request, Category $category, Article $article): RedirectResponse // RECEBE UM COMENTARIO NOVO
    {
        abort_unless(config('comments.enabled', true), 404); // COMENTARIOS DESLIGADOS NO SITE INTEIRO
        abort_unless($article->category_id === $category->id, 404); // O ARTIGO TEM QUE PERTENCER A CATEGORIA DA URL
        abort_unless($article->published_at && $article->published_at->isPast(), 404); // NAO SE COMENTA RASCUNHO

        $destino = route('article', [$category, $article]); // URL DO ARTIGO, USADA EM TODOS OS REDIRECTS ABAIXO

        $validador = Validator::make($request->all(), [ // VALIDACAO DOS CAMPOS DO FORMULARIO
            'author_name' => ['required', 'string', 'min:2', 'max:'.config('comments.name_max', 40)], // NOME EXIBIDO
            'author_email' => ['nullable', 'email:rfc', 'max:120'], // EMAIL OPCIONAL, NUNCA EXIBIDO NA PAGINA
            'body' => ['required', 'string', 'min:'.config('comments.min_length', 12), 'max:'.config('comments.max_length', 2000)], // TEXTO DO COMENTARIO
            'parent_id' => ['nullable', 'integer', 'exists:comments,id'], // RESPOSTA A OUTRO COMENTARIO
        ], [
            'body.min' => 'Please write a slightly longer comment so it is useful to other readers.', // MENSAGEM AMIGAVEL PARA TEXTO CURTO
            'author_name.required' => 'Please add a name so other readers know who is talking.', // MENSAGEM AMIGAVEL PARA NOME VAZIO
        ]);

        // O REDIRECT PRECISA CARREGAR A ANCORA #comments. SEM ISSO, O ERRO DE VALIDACAO JOGA O
        // LEITOR NO TOPO DE UM ARTIGO DE 4.000 PALAVRAS E ELE NUNCA VE A MENSAGEM LA EMBAIXO.
        if ($validador->fails()) { // ALGUM CAMPO INVALIDO
            throw (new ValidationException($validador))->redirectTo($destino.'#comments'); // VOLTA JA POSICIONADO NA SECAO
        }

        $dados = $validador->validated(); // CAMPOS JA VALIDADOS

        // ─── DEFESA 1: HONEYPOT ───
        // CAMPO INVISIVEL PARA GENTE E IRRESISTIVEL PARA BOT QUE PREENCHE TUDO QUE ENCONTRA.
        // RESPONDEMOS "SUCESSO" DE PROPOSITO: DIZER "VOCE FOI BARRADO" ENSINA O BOT A CONTORNAR.
        if (filled($request->input('website'))) { // O CAMPO ARMADILHA VEIO PREENCHIDO
            return redirect($destino.'#comments')->with('comment_status', 'pending'); // DESCARTA EM SILENCIO FINGINDO QUE DEU CERTO
        }

        // ─── DEFESA 2: ARMADILHA DE TEMPO ───
        $segundos = $this->segundosDesdeQueOFormularioAbriu($request->input('rendered_at')); // QUANTO TEMPO O FORMULARIO FICOU ABERTO

        if ($segundos !== null && $segundos < (int) config('comments.tempo_minimo_segundos', 4)) { // PREENCHEU RAPIDO DEMAIS PARA SER HUMANO
            return redirect($destino.'#comments')->with('comment_status', 'pending'); // MESMO SILENCIO DO HONEYPOT
        }

        if ($segundos !== null && $segundos > (int) config('comments.tempo_maximo_segundos', 86400)) { // ABA ABERTA HA MAIS DE 24 HORAS
            return redirect($destino.'#comments')->with('comment_error', 'This page was open for a while. Please reload and post again.'); // PEDE PARA RECARREGAR
        }

        // ─── DEFESA 3: LIMITE DE FREQUENCIA POR IP ───
        if ($erro = $this->estourouOLimite($request)) { // JA COMENTOU DEMAIS NA JANELA
            return redirect($destino.'#comments')->with('comment_error', $erro); // AVISA QUANDO PODE TENTAR DE NOVO
        }

        // ─── DEFESA 4: CLOUDFLARE TURNSTILE (SO SE AS CHAVES ESTIVEREM CONFIGURADAS) ───
        $captcha = $this->turnstile->verificar($request->input('cf-turnstile-response'), $request->ip()); // VALIDA O TOKEN DO WIDGET

        if (! $captcha['ok']) { // A CLOUDFLARE REPROVOU O TOKEN
            throw ValidationException::withMessages(['body' => 'We could not verify that you are human. Please reload the page and try again.'])->redirectTo($destino.'#comments'); // DEVOLVE ERRO DE VALIDACAO NO FORMULARIO
        }

        // ─── DEFESA 5: FILTRO DE CONTEUDO ───
        $veredito = $this->filtro->avaliar($dados['author_name'], $dados['body'], Comment::hashDeIp($request->ip())); // DECIDE approved / pending / spam

        if ($captcha['erro'] === 'indisponivel' && $veredito['status'] === Comment::APROVADO) { // A CLOUDFLARE ESTAVA FORA DO AR
            $veredito = ['status' => Comment::PENDENTE, 'motivo' => 'turnstile indisponivel no momento do envio']; // NAO PUBLICA SEM CONFERIR, MAS TAMBEM NAO PERDE O COMENTARIO
        }

        $pai = $this->paiValido($dados['parent_id'] ?? null, $article); // RESOLVE A RESPOSTA (SO 1 NIVEL DE PROFUNDIDADE)

        $comentario = $article->comments()->create([ // GRAVA O COMENTARIO VINCULADO AO ARTIGO
            'parent_id' => $pai?->id, // COMENTARIO PAI (NULO SE FOR RAIZ)
            'author_name' => trim($dados['author_name']), // NOME SEM ESPACOS NAS PONTAS
            'author_email' => $dados['author_email'] ?? null, // EMAIL OPCIONAL
            'body' => trim($dados['body']), // TEXTO SEM ESPACOS NAS PONTAS (ESCAPADO SO NA EXIBICAO)
            'status' => $veredito['status'], // STATUS DECIDIDO PELO FILTRO
            'held_reason' => $veredito['motivo'], // MOTIVO QUE APARECE NA FILA DE MODERACAO
            'ip_hash' => Comment::hashDeIp($request->ip()), // HASH DO IP (NUNCA O IP EM CLARO)
            'user_agent' => mb_substr((string) $request->userAgent(), 0, 255), // USER AGENT TRUNCADO PARA CABER NA COLUNA
        ]);

        $this->registraNoLimitador($request); // CONTABILIZA O ENVIO NOS TRES BALDES DE FREQUENCIA

        if ($comentario->status === Comment::APROVADO) { // COMENTARIO PUBLICADO NA HORA
            return redirect($destino.'#comment-'.$comentario->id)->with('comment_status', 'approved'); // LEVA O LEITOR ATE O PROPRIO COMENTARIO
        }

        return redirect($destino.'#comments')->with('comment_status', 'pending'); // PENDENTE E SPAM RECEBEM A MESMA RESPOSTA: NAO ENTREGAMOS O FILTRO AO SPAMMER
    }

    private function segundosDesdeQueOFormularioAbriu(?string $carimbo): ?int // LE O CARIMBO DE TEMPO CRIPTOGRAFADO DO FORMULARIO
    {
        if (blank($carimbo)) { // FORMULARIO ANTIGO OU SEM O CAMPO
            return null; // SEM CARIMBO A ARMADILHA DE TEMPO E SIMPLESMENTE PULADA
        }

        try {
            return time() - (int) Crypt::decryptString($carimbo); // O CARIMBO E CIFRADO COM A APP_KEY, ENTAO NAO DA PARA FORJAR
        } catch (\Throwable) { // CARIMBO ADULTERADO OU DE OUTRA APP_KEY
            return null; // TRATA COMO AUSENTE EM VEZ DE DERRUBAR O ENVIO DE UM LEITOR REAL
        }
    }

    private function estourouOLimite(Request $request): ?string // CHECA OS TRES BALDES DE FREQUENCIA SEM CONSUMIR TENTATIVA
    {
        foreach ($this->baldes($request) as [$chave, $maximo, $rotulo]) { // PERCORRE MINUTO, HORA E DIA
            if (RateLimiter::tooManyAttempts($chave, $maximo)) { // ESTOUROU ESTE BALDE
                $espera = RateLimiter::availableIn($chave); // SEGUNDOS ATE LIBERAR
                $emMinutos = max(1, (int) ceil($espera / 60)); // ARREDONDA PARA CIMA EM MINUTOS
                return "You have posted a few comments already ({$rotulo}). Please try again in {$emMinutos} minute(s)."; // MENSAGEM PARA O LEITOR
            }
        }
        return null; // NENHUM BALDE ESTOUROU
    }

    private function registraNoLimitador(Request $request): void // MARCA O ENVIO NOS TRES BALDES
    {
        foreach ($this->baldes($request) as [$chave, , , $janela]) { // PERCORRE MINUTO, HORA E DIA
            RateLimiter::hit($chave, $janela); // CONTABILIZA A TENTATIVA COM A JANELA DE CADA BALDE
        }
    }

    private function baldes(Request $request): array // DEFINE OS TRES BALDES DE FREQUENCIA PARA O IP ATUAL
    {
        $ip = sha1((string) $request->ip()); // IDENTIFICADOR CURTO DO IP (A CHAVE VIVE SO NO CACHE, NAO NO BANCO)
        $t = (array) config('comments.throttle', []); // LIMITES CONFIGURADOS

        return [
            ["comentario:min:{$ip}", (int) ($t['por_minuto'] ?? 2), 'per minute', 60], // BALDE DE 1 MINUTO
            ["comentario:hora:{$ip}", (int) ($t['por_hora'] ?? 5), 'per hour', 3600], // BALDE DE 1 HORA
            ["comentario:dia:{$ip}", (int) ($t['por_dia'] ?? 15), 'per day', 86400], // BALDE DE 24 HORAS
        ];
    }

    private function paiValido(?int $parentId, Article $article): ?Comment // GARANTE QUE A RESPOSTA APONTA PARA UM COMENTARIO VALIDO DESTE ARTIGO
    {
        if (! $parentId) { // COMENTARIO RAIZ
            return null; // SEM PAI
        }

        $pai = Comment::aprovados()->where('article_id', $article->id)->find($parentId); // SO SE RESPONDE A COMENTARIO APROVADO DO MESMO ARTIGO

        // ACHATA A ARVORE EM UM NIVEL: RESPONDER A UMA RESPOSTA PENDURA NO COMENTARIO RAIZ DELA.
        // CONVERSA ANINHADA SEM FIM FICA ILEGIVEL NO MOBILE, QUE E DE ONDE VEM A MAIOR PARTE DO TRAFEGO.
        return $pai?->parent_id ? $pai->parent : $pai; // SUBSTITUI O PAI PELO AVO QUANDO NECESSARIO
    }
}
