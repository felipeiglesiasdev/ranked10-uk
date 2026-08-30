<?php

namespace App\Services;

use App\Models\Comment; // IMPORTA O MODEL DE COMENTARIOS (CONSTANTES DE STATUS E CONSULTA DE REINCIDENCIA)
use Illuminate\Support\Str; // IMPORTA O HELPER DE STRINGS

// FILTRO DE SPAM DOS COMENTARIOS. RECEBE O QUE O VISITANTE ESCREVEU E DEVOLVE O STATUS INICIAL
// DO COMENTARIO (approved / pending / spam) MAIS O MOTIVO, QUE APARECE NA FILA DE MODERACAO.
// TODA REGRA E CONFIGURAVEL EM config/comments.php — NAO ADICIONE CONSTANTE SOLTA AQUI DENTRO.
class FiltroDeComentario
{
    // TLDS QUE APARECEM EM DOMINIO ESCRITO SEM http:// NEM www. ("compreiaqui.shop", "amazon.co.uk").
    // A LISTA E CURTA DE PROPOSITO: CADA TLD A MAIS AUMENTA O RISCO DE UM FALSO POSITIVO NUM
    // NOME DE MODELO DE PRODUTO, QUE E CHEIO DE PONTO ("Bosch 2.5.1", "V15 Detect").
    private const TLDS = 'com|co\.uk|org\.uk|net|org|io|xyz|ru|top|shop|online|info|biz|store|site|click|live|icu|cn';

    public function avaliar(string $nome, string $texto, ?string $ipHash = null): array // DECIDE O DESTINO DO COMENTARIO
    {
        $normalizado = $this->normalizar($texto); // TEXTO SEM ACENTO, EM MINUSCULA E COM ESPACOS COLAPSADOS
        $nomeNormalizado = $this->normalizar($nome); // MESMO TRATAMENTO PARA O NOME
        $links = $this->contaLinks($texto); // QUANTOS LINKS OU DOMINIOS O TEXTO CONTEM

        // ─── REGRAS DURAS: VIRA spam E NUNCA APARECE NA PAGINA ───

        if ($palavra = $this->palavraBloqueada($normalizado.' '.$nomeNormalizado)) { // PROCURA NO TEXTO E NO NOME
            return $this->resultado(Comment::SPAM, "palavra bloqueada: \"{$palavra}\""); // MARCA COMO SPAM NOMEANDO A PALAVRA
        }

        if ($links > (int) config('comments.max_links', 2)) { // DESPEJO DE LINK
            return $this->resultado(Comment::SPAM, "{$links} links num so comentario"); // MARCA COMO SPAM
        }

        if ($this->contaLinks($nome) > 0) { // NOME DE PESSOA NUNCA CONTEM URL
            return $this->resultado(Comment::SPAM, 'o campo de nome contem uma URL'); // MARCA COMO SPAM
        }

        // ─── REGRAS BRANDAS: VIRA pending E ESPERA SUA APROVACAO ───

        if (config('comments.segurar.reincidente', true) && $ipHash && $this->jaTeveSpam($ipHash)) { // MESMO AUTOR JA MARCADO COMO SPAM ANTES
            return $this->resultado(Comment::PENDENTE, 'mesmo autor ja teve comentario marcado como spam'); // SEGURA PARA CONFERIR
        }

        if ($links > 0 && config('comments.segurar.com_link', true)) { // QUALQUER LINK SEGURA
            return $this->resultado(Comment::PENDENTE, $links === 1 ? 'contem 1 link' : "contem {$links} links"); // SEGURA PARA CONFERIR
        }

        if (config('comments.segurar.tudo_maiusculo', true) && $this->estaGritando($texto)) { // TEXTO TODO EM CAIXA ALTA
            return $this->resultado(Comment::PENDENTE, 'texto quase todo em maiusculas'); // SEGURA PARA CONFERIR
        }

        if (config('comments.segurar.primeiro_do_autor', false) && $ipHash && ! $this->jaFoiAprovado($ipHash)) { // PRIMEIRA VEZ DESTE AUTOR
            return $this->resultado(Comment::PENDENTE, 'primeiro comentario deste autor'); // SEGURA PARA CONFERIR
        }

        return $this->resultado(Comment::APROVADO, null); // PASSOU EM TUDO: PUBLICA NA HORA
    }

    public function contaLinks(string $texto): int // CONTA URLS E DOMINIOS SOLTOS NO TEXTO
    {
        $comEsquema = preg_match_all('~(?:https?://|www\.)\S+~i', $texto); // http://, https:// E www.
        $semEsquema = preg_match_all('~\b[a-z0-9][a-z0-9-]{0,62}\.(?:'.self::TLDS.')\b(?![a-z0-9-])~i', $texto); // DOMINIO ESCRITO SEM ESQUEMA ({0,62} E NAO {1,62}: "a.com" TEM ROTULO DE UMA LETRA SO E PRECISA CONTAR)
        return max((int) $comEsquema, (int) $semEsquema); // max E NAO SOMA: "www.amazon.co.uk" CASA NOS DOIS PADROES E CONTARIA DOBRADO
    }

    private function palavraBloqueada(string $normalizado): ?string // DEVOLVE A PRIMEIRA PALAVRA BLOQUEADA ENCONTRADA
    {
        foreach ((array) config('comments.palavras_bloqueadas', []) as $palavra) { // PERCORRE A LISTA DA CONFIG
            $alvo = $this->normalizar($palavra); // NORMALIZA A PALAVRA DA LISTA DO MESMO JEITO QUE O TEXTO
            if ($alvo !== '' && str_contains($normalizado, $alvo)) { // ACHOU A EXPRESSAO NO TEXTO
                return $palavra; // RETORNA A PALAVRA ORIGINAL PARA APARECER NO MOTIVO
            }
        }
        return null; // NENHUMA PALAVRA BLOQUEADA
    }

    private function estaGritando(string $texto): bool // DETECTA TEXTO QUASE TODO EM CAIXA ALTA
    {
        $letras = preg_replace('/[^\p{L}]/u', '', $texto) ?? ''; // FICA SO COM AS LETRAS (NUMERO E PONTUACAO NAO CONTAM)
        if (mb_strlen($letras) < 20) { // TEXTO CURTO EM MAIUSCULA E SIGLA OU ENFASE, NAO GRITO
            return false; // NAO E GRITO
        }
        $maiusculas = mb_strlen(preg_replace('/[^\p{Lu}]/u', '', $letras) ?? ''); // QUANTAS LETRAS SAO MAIUSCULAS
        return ($maiusculas / mb_strlen($letras)) > 0.7; // MAIS DE 70% EM CAIXA ALTA E GRITO
    }

    private function jaTeveSpam(string $ipHash): bool // CHECA SE ESTE AUTOR JA TEVE ALGO MARCADO COMO SPAM
    {
        return Comment::where('ip_hash', $ipHash)->where('status', Comment::SPAM)->exists(); // CONSULTA PELO INDICE DE ip_hash
    }

    private function jaFoiAprovado(string $ipHash): bool // CHECA SE ESTE AUTOR JA TEVE ALGUM COMENTARIO APROVADO
    {
        return Comment::where('ip_hash', $ipHash)->where('status', Comment::APROVADO)->exists(); // CONSULTA PELO INDICE DE ip_hash
    }

    private function normalizar(string $valor): string // DEIXA O TEXTO COMPARAVEL: SEM ACENTO, MINUSCULO, ESPACO SIMPLES
    {
        return trim(preg_replace('/\s+/', ' ', mb_strtolower(Str::ascii($valor))) ?? ''); // ASCII + MINUSCULA + ESPACOS COLAPSADOS
    }

    private function resultado(string $status, ?string $motivo): array // PADRONIZA O RETORNO DO FILTRO
    {
        return ['status' => $status, 'motivo' => $motivo]; // STATUS INICIAL DO COMENTARIO E O PORQUE
    }
}
