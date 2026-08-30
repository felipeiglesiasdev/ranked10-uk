<?php

namespace App\Console\Commands;

use App\Models\Comment; // IMPORTA O MODEL DE COMENTARIOS
use Illuminate\Console\Command; // IMPORTA A CLASSE BASE DOS COMANDOS ARTISAN
use Illuminate\Support\Str; // IMPORTA O HELPER DE STRINGS

// ═══════════════════════════════════════════════════════════════════════════
// ═══ FILA DE MODERACAO DOS COMENTARIOS ═══
//
// POR QUE E UM COMANDO ARTISAN E NAO UM PAINEL WEB: O ranked10 NAO TEM LOGIN NENHUM. UM PAINEL
// WEB EXIGIRIA CRIAR AUTENTICACAO, UMA ROTA ADMIN E MAIS SUPERFICIE DE ATAQUE NUM SITE QUE HOJE
// SO TEM ROTAS GET PUBLICAS. E COMO O BANCO LOCAL *E* O DE PRODUCAO, RODAR DAQUI JA MODERA O AR.
//
//   php artisan comments:moderate                 → REVISA A FILA UM A UM (INTERATIVO)
//   php artisan comments:moderate --list          → SO LISTA, NAO PERGUNTA NADA
//   php artisan comments:moderate --approve=12    → APROVA O COMENTARIO 12 DIRETO
//   php artisan comments:moderate --spam=12       → MARCA O 12 COMO SPAM
//   php artisan comments:moderate --delete=12     → APAGA O 12 DE VEZ
//   php artisan comments:moderate --spam-queue    → REVISA O QUE O FILTRO MARCOU COMO SPAM
// ═══════════════════════════════════════════════════════════════════════════
class ModerarComentarios extends Command
{
    protected $signature = 'comments:moderate
        {--list : Apenas lista a fila, sem perguntar nada}
        {--spam-queue : Revisa o que o filtro marcou como spam, em vez da fila de pendentes}
        {--approve= : Aprova o comentario com este ID}
        {--spam= : Marca o comentario com este ID como spam}
        {--delete= : Apaga o comentario com este ID}'; // ASSINATURA E OPCOES DO COMANDO

    protected $description = 'Revisa, aprova ou descarta os comentarios que o filtro segurou'; // DESCRICAO QUE APARECE NO php artisan list

    public function handle(): int // PONTO DE ENTRADA DO COMANDO
    {
        foreach (['approve' => Comment::APROVADO, 'spam' => Comment::SPAM] as $opcao => $status) { // ACOES DIRETAS POR ID
            if ($id = $this->option($opcao)) { // A OPCAO FOI PASSADA
                return $this->mudaStatus((int) $id, $status); // APLICA E SAI
            }
        }

        if ($id = $this->option('delete')) { // APAGAR DE VEZ
            return $this->apaga((int) $id); // APLICA E SAI
        }

        $statusAlvo = $this->option('spam-queue') ? Comment::SPAM : Comment::PENDENTE; // QUAL FILA REVISAR

        $fila = Comment::where('status', $statusAlvo) // BUSCA A FILA ESCOLHIDA
            ->with('article.category') // CARREGA ARTIGO E CATEGORIA PARA MOSTRAR ONDE O COMENTARIO ESTA
            ->oldest() // MAIS ANTIGOS PRIMEIRO: QUEM ESPERA HA MAIS TEMPO E ATENDIDO ANTES
            ->get(); // EXECUTA A CONSULTA

        if ($fila->isEmpty()) { // NADA NA FILA
            $this->components->info($statusAlvo === Comment::SPAM ? 'Nenhum comentario marcado como spam.' : 'Fila vazia — nenhum comentario aguardando aprovacao.'); // AVISA E SAI
            return self::SUCCESS; // TERMINA COM SUCESSO
        }

        $this->newLine(); // ESPACO ANTES DO CABECALHO
        $this->components->twoColumnDetail('<fg=yellow;options=bold>FILA DE MODERACAO</>', $fila->count().' comentario(s) em "'.$statusAlvo.'"'); // CABECALHO COM O TOTAL
        $this->newLine(); // ESPACO DEPOIS DO CABECALHO

        foreach ($fila as $comentario) { // PERCORRE A FILA
            $this->mostra($comentario); // IMPRIME O COMENTARIO INTEIRO

            if ($this->option('list')) { // MODO SO LEITURA
                continue; // NAO PERGUNTA NADA, VAI PARA O PROXIMO
            }

            $escolha = $this->choice('O que fazer com este comentario?', [ // PERGUNTA A ACAO
                'k' => 'Keep (deixa na fila e decide depois)', // MANTEM COMO ESTA
                'a' => 'Approve (publica no site agora)', // APROVA
                's' => 'Spam (marca como spam, nunca aparece)', // MARCA COMO SPAM
                'd' => 'Delete (apaga do banco de vez)', // APAGA
                'q' => 'Quit (sai da revisao)', // ENCERRA
            ], 'k'); // PADRAO E NAO FAZER NADA — A TECLA ENTER NUNCA PUBLICA POR ACIDENTE

            match ($escolha) { // APLICA A ESCOLHA
                'a' => $this->mudaStatus($comentario->id, Comment::APROVADO), // PUBLICA
                's' => $this->mudaStatus($comentario->id, Comment::SPAM), // MARCA COMO SPAM
                'd' => $this->apaga($comentario->id), // APAGA
                'q' => null, // SAIR: TRATADO LOGO ABAIXO
                default => $this->components->warn('Mantido na fila.'), // MANTEM
            };

            if ($escolha === 'q') { // O USUARIO PEDIU PARA SAIR
                $this->components->info('Revisao encerrada. O resto da fila continua aguardando.'); // AVISA
                return self::SUCCESS; // TERMINA
            }

            $this->newLine(); // ESPACO ANTES DO PROXIMO COMENTARIO
        }

        $this->components->info('Fim da fila.'); // AVISA QUE ACABOU
        return self::SUCCESS; // TERMINA COM SUCESSO
    }

    private function mostra(Comment $comentario): void // IMPRIME UM COMENTARIO COM TODO O CONTEXTO NECESSARIO PARA DECIDIR
    {
        $artigo = $comentario->article; // ARTIGO COMENTADO
        $onde = $artigo && $artigo->category ? '/'.$artigo->category->slug.'/'.$artigo->slug : 'artigo removido'; // CAMINHO DO ARTIGO

        $this->line('  <fg=gray>#'.$comentario->id.'</>  <options=bold>'.$comentario->author_name.'</>  <fg=gray>'.$comentario->created_at->diffForHumans().'</>'); // LINHA 1: ID, AUTOR E QUANDO
        $this->line('  <fg=gray>em</> '.$onde); // LINHA 2: ONDE FOI COMENTADO

        if ($comentario->held_reason) { // O FILTRO EXPLICOU POR QUE SEGUROU
            $this->line('  <fg=yellow>motivo:</> '.$comentario->held_reason); // LINHA 3: O MOTIVO
        }

        if ($comentario->parent_id) { // E UMA RESPOSTA
            $this->line('  <fg=gray>resposta ao comentario #'.$comentario->parent_id.'</>'); // LINHA 4: A QUEM RESPONDE
        }

        $this->newLine(); // ESPACO ANTES DO TEXTO
        foreach (explode("\n", wordwrap($comentario->body, 88)) as $linha) { // QUEBRA O TEXTO EM 88 COLUNAS PARA CABER NO TERMINAL
            $this->line('    '.$linha); // TEXTO DO COMENTARIO INDENTADO
        }
        $this->newLine(); // ESPACO DEPOIS DO TEXTO
    }

    private function mudaStatus(int $id, string $status): int // APLICA UM STATUS NOVO A UM COMENTARIO
    {
        $comentario = Comment::find($id); // BUSCA PELO ID

        if (! $comentario) { // ID INEXISTENTE
            $this->components->error("Comentario #{$id} nao encontrado."); // AVISA
            return self::FAILURE; // TERMINA COM ERRO
        }

        $comentario->update(['status' => $status]); // GRAVA O STATUS NOVO

        $this->components->info($status === Comment::APROVADO // MENSAGEM DE CONFIRMACAO
            ? "Comentario #{$id} de {$comentario->author_name} publicado." // APROVADO
            : "Comentario #{$id} de {$comentario->author_name} marcado como {$status}."); // OUTRO STATUS

        return self::SUCCESS; // TERMINA COM SUCESSO
    }

    private function apaga(int $id): int // REMOVE UM COMENTARIO DO BANCO
    {
        $comentario = Comment::find($id); // BUSCA PELO ID

        if (! $comentario) { // ID INEXISTENTE
            $this->components->error("Comentario #{$id} nao encontrado."); // AVISA
            return self::FAILURE; // TERMINA COM ERRO
        }

        // MOSTRA O QUE VAI SUMIR ANTES DE CONFIRMAR: APAGAR E IRREVERSIVEL E LEVA AS RESPOSTAS JUNTO
        // (A FK E cascadeOnDelete). MARCAR COMO SPAM RESOLVE O MESMO PROBLEMA SEM PERDER O REGISTRO.
        $this->components->warn('Vai apagar: "'.Str::limit($comentario->body, 70).'" ('.$comentario->replies()->count().' resposta(s) junto)'); // PREVIA DO ESTRAGO

        if (! $this->confirm('Confirma? Isto nao tem volta.', false)) { // PEDE CONFIRMACAO, PADRAO "NAO"
            $this->components->info('Cancelado. Nada foi apagado.'); // AVISA QUE ABORTOU
            return self::SUCCESS; // TERMINA SEM FAZER NADA
        }

        $comentario->delete(); // APAGA DE VEZ
        $this->components->info("Comentario #{$id} apagado."); // CONFIRMA
        return self::SUCCESS; // TERMINA COM SUCESSO
    }
}
