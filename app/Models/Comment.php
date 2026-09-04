<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder; // IMPORTA O BUILDER PARA TIPAR OS SCOPES
use Illuminate\Database\Eloquent\Model; // IMPORTA A CLASSE BASE DOS MODELS
use Illuminate\Database\Eloquent\Relations\BelongsTo; // IMPORTA O TIPO DE RETORNO DO BELONGSTO
use Illuminate\Database\Eloquent\Relations\HasMany; // IMPORTA O TIPO DE RETORNO DO HASMANY
use Illuminate\Support\Facades\Config; // IMPORTA A FACADE CONFIG PARA LER A APP_KEY NO HASH DO IP
use Illuminate\Support\Str; // IMPORTA O HELPER DE STRINGS

class Comment extends Model
{
    public const APROVADO = 'approved'; // COMENTARIO VISIVEL NA PAGINA
    public const PENDENTE = 'pending';  // COMENTARIO NA FILA DE MODERACAO
    public const SPAM = 'spam';         // COMENTARIO DESCARTADO PELO FILTRO

    protected $fillable = ['article_id', 'product_id', 'parent_id', 'author_name', 'author_email', 'body', 'status', 'held_reason', 'ip_hash', 'user_agent']; // CAMPOS PERMITIDOS NO PREENCHIMENTO EM MASSA

    protected $hidden = ['author_email', 'ip_hash', 'user_agent']; // NUNCA SEREM SERIALIZADOS: SAO DADOS PESSOAIS QUE NAO VAO PARA A PAGINA

    public function article(): BelongsTo // RELACIONAMENTO: O COMENTARIO PERTENCE A UM ARTIGO
    {
        return $this->belongsTo(Article::class); // RETORNA O ARTIGO COMENTADO
    }

    public function product(): BelongsTo // RELACIONAMENTO: O COMENTARIO PODE PERTENCER A UMA PAGINA DE PRODUTO
    {
        return $this->belongsTo(Product::class); // NULO QUANDO O COMENTARIO E DO ARTIGO E NAO DE UM PRODUTO
    }

    public function parent(): BelongsTo // RELACIONAMENTO: O COMENTARIO PODE RESPONDER A OUTRO
    {
        return $this->belongsTo(self::class, 'parent_id'); // RETORNA O COMENTARIO PAI (NULO SE FOR RAIZ)
    }

    public function replies(): HasMany // RELACIONAMENTO: UM COMENTARIO TEM MUITAS RESPOSTAS
    {
        return $this->hasMany(self::class, 'parent_id')->where('status', self::APROVADO)->oldest(); // SO RESPOSTAS APROVADAS, DA MAIS ANTIGA PARA A MAIS NOVA (ORDEM DE LEITURA DE CONVERSA)
    }

    public function scopeAprovados(Builder $query): Builder // SCOPE: SO OS COMENTARIOS PUBLICADOS
    {
        return $query->where('status', self::APROVADO); // FILTRA PELO STATUS APROVADO
    }

    public function scopePendentes(Builder $query): Builder // SCOPE: SO OS COMENTARIOS NA FILA DE MODERACAO
    {
        return $query->where('status', self::PENDENTE); // FILTRA PELO STATUS PENDENTE
    }

    public function scopeRaizes(Builder $query): Builder // SCOPE: SO OS COMENTARIOS DE PRIMEIRO NIVEL (NAO SAO RESPOSTA DE NINGUEM)
    {
        return $query->whereNull('parent_id'); // FILTRA OS QUE NAO TEM PAI
    }

    public static function hashDeIp(?string $ip): ?string // GERA O HASH DO IP PARA GUARDAR NO BANCO SEM ARMAZENAR O IP EM CLARO
    {
        // POR QUE HASH E NAO O IP: O IP E DADO PESSOAL SOB O UK GDPR. O HASH COM A APP_KEY COMO SAL
        // AINDA PERMITE COMPARAR "E O MESMO AUTOR DE ONTEM?" SEM NUNCA GUARDAR O ENDERECO EM SI.
        return $ip ? hash('sha256', $ip.'|'.Config::get('app.key')) : null; // SHA-256 DO IP SALGADO COM A CHAVE DA APLICACAO
    }

    public function getIniciaisAttribute(): string // INICIAIS DO AUTOR PARA O AVATAR (EVITA REQUISICAO EXTERNA DE GRAVATAR)
    {
        return Str::of($this->author_name)->trim()->explode(' ')->filter()->take(2)->map(fn ($p) => mb_strtoupper(mb_substr($p, 0, 1)))->implode('') ?: '?'; // ATE DUAS LETRAS MAIUSCULAS
    }

    public function getCorDoAvatarAttribute(): string // COR DETERMINISTICA DO AVATAR, DERIVADA DO NOME (MESMO NOME = MESMA COR SEMPRE)
    {
        $paleta = ['bg-slate-700', 'bg-brand', 'bg-amber-600', 'bg-emerald-700', 'bg-indigo-700', 'bg-rose-700']; // PALETA COM CONTRASTE SUFICIENTE PARA TEXTO BRANCO (WCAG AA)
        return $paleta[crc32(mb_strtolower(trim($this->author_name))) % count($paleta)]; // ESCOLHE PELA CRC32 DO NOME NORMALIZADO
    }

    public function getBodyHtmlAttribute(): string // RENDERIZA O CORPO DO COMENTARIO COMO HTML SEGURO, COM OS ATRIBUTOS DE LINK AUTOMATICOS
    {
        // ORDEM OBRIGATORIA: ESCAPAR PRIMEIRO, LINKAR DEPOIS.
        // ESCAPAR PRIMEIRO MATA QUALQUER HTML/SCRIPT ENVIADO PELO VISITANTE (XSS). SO DEPOIS DISSO
        // NOS MESMOS CONSTRUIMOS AS UNICAS TAGS QUE EXISTEM AQUI: <p>, <br> E <a>. NUNCA O CONTRARIO.
        $texto = e(trim($this->body)); // ESCAPA TUDO: < > & " ' VIRAM ENTIDADES

        // LINKIFICA URLS COM OS ATRIBUTOS OBRIGATORIOS DE CONTEUDO DE TERCEIRO:
        //   rel="ugc"      → DECLARA AO GOOGLE QUE O LINK VEIO DE CONTEUDO GERADO PELO USUARIO
        //   rel="nofollow" → NAO PASSA AUTORIDADE DE LINK (PROTEGE O PERFIL DE LINKS DO DOMINIO)
        //   rel="noopener" → IMPEDE QUE A PAGINA DE DESTINO ACESSE window.opener
        //   target=_blank  → MANTEM O LEITOR NO ARTIGO
        // O & JA VIROU &amp; NO ESCAPE ACIMA, QUE E EXATAMENTE O QUE DEVE IR DENTRO DO href.
        $padrao = '~(?<inicio>^|[\s(])(?<url>(?:https?://|www\.)[^\s<>"]+)~iu'; // CASA http(s):// OU www. ATE O PROXIMO ESPACO

        $texto = preg_replace_callback($padrao, function (array $m): string {
            $url = rtrim($m['url'], '.,;:!?)'); // TIRA PONTUACAO FINAL QUE GRUDOU NA URL (". " NO FIM DA FRASE)
            $sufixo = mb_substr($m['url'], mb_strlen($url)); // O QUE FOI CORTADO VOLTA COMO TEXTO NORMAL FORA DO LINK
            $href = Str::startsWith(mb_strtolower($url), 'www.') ? 'https://'.$url : $url; // www. SEM ESQUEMA RECEBE https://
            $rotulo = Str::limit($url, 60); // ROTULO VISIVEL ENCURTADO PARA NAO ESTOURAR O LAYOUT NO MOBILE

            return $m['inicio'].'<a href="'.$href.'" rel="ugc nofollow noopener" target="_blank" class="break-all font-medium text-brand underline underline-offset-2 hover:text-brand-light">'.$rotulo.'</a>'.$sufixo; // ANCORA COM OS ATRIBUTOS AUTOMATICOS
        }, $texto) ?? $texto; // SE O preg_replace_callback FALHAR, MANTEM O TEXTO ESCAPADO SEM LINKS

        // MONTA OS PARAGRAFOS: LINHA EM BRANCO SEPARA <p>, QUEBRA SIMPLES VIRA <br>
        $paragrafos = preg_split('/\n{2,}/', $texto) ?: [$texto]; // QUEBRA EM BLOCOS POR LINHA EM BRANCO

        return collect($paragrafos)
            ->map(fn ($p) => trim($p)) // LIMPA ESPACOS DAS PONTAS DE CADA BLOCO
            ->filter() // DESCARTA BLOCOS VAZIOS
            ->map(fn ($p) => '<p>'.nl2br($p, false).'</p>') // CADA BLOCO VIRA UM PARAGRAFO COM <br> NAS QUEBRAS SIMPLES
            ->implode(''); // JUNTA TUDO NUM UNICO HTML
    }
}
