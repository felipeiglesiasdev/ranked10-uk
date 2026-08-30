<?php

namespace App\Support;

use Illuminate\Support\Collection; // IMPORTA A COLECAO DO LARAVEL
use Illuminate\Support\Str; // IMPORTA O HELPER DE STRINGS

// ACESSO AOS PERFIS DE AUTOR DE config/authors.php.
// EXISTE PARA QUE A RESOLUCAO DA FOTO E A BUSCA POR NOME/SLUG FIQUEM NUM LUGAR SO — ANTES DISSO
// A REGRA DA FOTO ESTAVA DUPLICADA NA VIEW E NO SCHEMA, E SO UMA DAS DUAS SABIA LIDAR COM CDN.
class Autores
{
    public static function todos(): Collection // TODOS OS PERFIS CADASTRADOS
    {
        return collect(config('authors', [])); // COLECAO DOS ARRAYS DE PERFIL
    }

    public static function porNome(?string $nome): ?array // ACHA O PERFIL PELO NOME EXIBIDO (E O QUE FICA GRAVADO EM articles.author)
    {
        return $nome ? self::todos()->firstWhere('name', $nome) : null; // NULO SE O AUTOR NAO ESTIVER CADASTRADO
    }

    public static function porSlug(?string $slug): ?array // ACHA O PERFIL PELO SLUG DA URL /author/<slug>
    {
        return $slug ? self::todos()->firstWhere('slug', $slug) : null; // NULO SE NAO EXISTIR
    }

    public static function foto(?array $autor): ?string // RESOLVE A URL DA FOTO, ACEITANDO CDN OU ARQUIVO LOCAL
    {
        $caminho = $autor['photo'] ?? null; // VALOR CRU DA CONFIG

        if (blank($caminho)) { // CAMPO VAZIO
            return null; // SEM FOTO: A VIEW DESENHA O AVATAR COM AS INICIAIS
        }

        if (Str::startsWith($caminho, ['http://', 'https://', '//'])) { // JA E URL COMPLETA (CDN)
            return $caminho; // USA COMO ESTA, SEM TOCAR NO DISCO
        }

        // CAMINHO LOCAL: SO DEVOLVE SE O ARQUIVO EXISTIR DE VERDADE EM public/.
        // SEM ESSA CHECAGEM, UM CAMINHO ERRADO NA CONFIG VIRARIA UMA IMAGEM QUEBRADA NA PAGINA
        // E, PIOR, UM og:image QUEBRADO NO SCHEMA — QUE E ONDE O GOOGLE OLHA.
        return file_exists(public_path($caminho)) ? asset($caminho) : null; // URL PUBLICA OU NULO
    }

    public static function iniciais(?array $autor): string // INICIAIS PARA O AVATAR DE FALLBACK
    {
        return Str::of($autor['name'] ?? '?')->trim()->explode(' ')->filter()->take(2)->map(fn ($p) => mb_strtoupper(mb_substr($p, 0, 1)))->implode('') ?: '?'; // ATE DUAS LETRAS
    }

    public static function anosDeSeo(?array $autor): ?int // HA QUANTOS ANOS O AUTOR TRABALHA COM SEO (CALCULADO, NUNCA FIXO NO TEXTO)
    {
        // O NUMERO E DERIVADO DO ANO INICIAL DE PROPOSITO: TEXTO COM "8 ANOS DE EXPERIENCIA"
        // ESCRITO NA MAO ENVELHECE E VIRA UMA IMPRECISAO QUE NINGUEM LEMBRA DE CORRIGIR.
        return isset($autor['seo_since']) ? max(1, (int) date('Y') - (int) $autor['seo_since']) : null; // ANOS COMPLETOS
    }
}
