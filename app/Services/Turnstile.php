<?php

namespace App\Services;

use Illuminate\Support\Facades\Http; // IMPORTA O CLIENTE HTTP DO LARAVEL
use Illuminate\Support\Facades\Log; // IMPORTA O LOG PARA REGISTRAR FALHA DE REDE

// VERIFICACAO DO CLOUDFLARE TURNSTILE (CAPTCHA INVISIVEL, SEM COOKIE DE RASTREAMENTO).
//
// ⚠ O SISTEMA FUNCIONA COM E SEM AS CHAVES. ENQUANTO TURNSTILE_SITE_KEY E TURNSTILE_SECRET_KEY
// ESTIVEREM VAZIAS, O WIDGET NAO E RENDERIZADO E A VERIFICACAO E PULADA — AS OUTRAS DEFESAS
// (HONEYPOT, ARMADILHA DE TEMPO, RATE LIMIT E FILTRO DE CONTEUDO) CONTINUAM VALENDO.
// BASTA PREENCHER AS DUAS CHAVES NO .env PARA O CAPTCHA ENTRAR EM OPERACAO, SEM MEXER EM CODIGO.
class Turnstile
{
    private const ENDPOINT = 'https://challenges.cloudflare.com/turnstile/v0/siteverify'; // ENDPOINT OFICIAL DE VALIDACAO

    public function configurado(): bool // DIZ SE AS DUAS CHAVES ESTAO PREENCHIDAS
    {
        return filled(config('services.turnstile.site_key')) && filled(config('services.turnstile.secret_key')); // PRECISA DAS DUAS: A PUBLICA RENDERIZA, A SECRETA VALIDA
    }

    public function siteKey(): ?string // CHAVE PUBLICA QUE VAI PARA O HTML DO FORMULARIO
    {
        return $this->configurado() ? config('services.turnstile.site_key') : null; // SO DEVOLVE SE O PAR ESTIVER COMPLETO
    }

    public function verificar(?string $token, ?string $ip = null): array // VALIDA O TOKEN DO WIDGET CONTRA A CLOUDFLARE
    {
        if (! $this->configurado()) { // SEM CHAVES O CAPTCHA NEM EXISTE NA PAGINA
            return ['ok' => true, 'erro' => null]; // PASSA DIRETO
        }

        if (blank($token)) { // O FORMULARIO CHEGOU SEM O TOKEN DO WIDGET
            return ['ok' => false, 'erro' => 'missing-input-response']; // REPROVA: OU E BOT, OU O JAVASCRIPT NAO RODOU
        }

        try {
            $resposta = Http::asForm()->timeout(5)->post(self::ENDPOINT, array_filter([ // CHAMADA COM TETO DE 5 SEGUNDOS
                'secret' => config('services.turnstile.secret_key'), // CHAVE SECRETA DO SITE
                'response' => $token, // TOKEN GERADO PELO WIDGET NO NAVEGADOR
                'remoteip' => $ip, // IP DO VISITANTE (OPCIONAL, MELHORA A PRECISAO)
            ]));
        } catch (\Throwable $e) { // A CLOUDFLARE NAO RESPONDEU (REDE, TIMEOUT, DNS)
            Log::warning('Turnstile indisponivel: '.$e->getMessage()); // REGISTRA PARA DIAGNOSTICO
            // FALHA ABERTA, MAS NAO PUBLICA: O CONTROLLER LE ESTE 'erro' E MANDA O COMENTARIO
            // PARA A FILA DE MODERACAO. UM BLIP DA CLOUDFLARE NAO PODE IMPEDIR UM LEITOR REAL
            // DE COMENTAR, E TAMBEM NAO PODE VIRAR PORTA ABERTA PARA PUBLICACAO AUTOMATICA.
            return ['ok' => true, 'erro' => 'indisponivel']; // ACEITA O ENVIO SINALIZANDO QUE NAO DEU PARA CONFERIR
        }

        if (! $resposta->successful() || $resposta->json('success') !== true) { // A CLOUDFLARE RESPONDEU E REPROVOU
            return ['ok' => false, 'erro' => implode(', ', (array) $resposta->json('error-codes', ['falhou']))]; // DEVOLVE OS CODIGOS DE ERRO DELA
        }

        return ['ok' => true, 'erro' => null]; // TOKEN VALIDO
    }
}
