<?php

// ═══════════════════════════════════════════════════════════════════════════
// ═══ CONFIGURACAO DOS COMENTARIOS (EDITE AQUI, NAO NO CODIGO) ═══
//
// O SISTEMA E "SEM LOGIN": QUALQUER LEITOR COMENTA COM NOME + TEXTO. ISSO E DE PROPOSITO —
// EXIGIR CADASTRO NUM SITE DE AFILIADO DERRUBA A TAXA DE COMENTARIO PARA PERTO DE ZERO.
// O PRECO DISSO E QUE A DEFESA CONTRA SPAM TEM QUE SER TODA AUTOMATICA, E ELA MORA AQUI.
//
// POLITICA DE MODERACAO: HIBRIDA.
//   PASSOU EM TUDO ............ approved → APARECE NA PAGINA NA HORA
//   TROPECOU NUM SINAL ........ pending  → FICA NA FILA (php artisan comments:pending)
//   BATEU NUMA REGRA DURA ..... spam     → NUNCA APARECE, MAS FICA GRAVADO PARA AUDITORIA
// ═══════════════════════════════════════════════════════════════════════════

return [

    'enabled' => env('COMMENTS_ENABLED', true), // LIGA/DESLIGA A SECAO DE COMENTARIOS EM TODO O SITE

    'per_page' => 20, // QUANTOS COMENTARIOS RAIZ APARECEM POR ARTIGO (COM AS RESPOSTAS DELES JUNTO)

    // ─── LIMITES DE TAMANHO ───
    'min_length' => 12,   // ABAIXO DISSO NAO E COMENTARIO, E RUIDO ("nice", "ok", "thanks")
    'max_length' => 2000, // TETO DO TEXTO. ACIMA DISSO O FORMULARIO REJEITA ANTES DE GRAVAR
    'name_max' => 40,     // TETO DO NOME EXIBIDO

    // ─── LIMITES DE FREQUENCIA (POR IP, VIA RateLimiter — NAO GRAVA IP EM CLARO) ───
    'throttle' => [
        'por_minuto' => 2,  // NO MAXIMO 2 ENVIOS POR MINUTO (BARRA O CLIQUE DUPLO E O SCRIPT INGENUO)
        'por_hora' => 5,    // NO MAXIMO 5 COMENTARIOS POR HORA
        'por_dia' => 15,    // NO MAXIMO 15 COMENTARIOS POR DIA
    ],

    // ─── ARMADILHA DE TEMPO ───
    // BOT PREENCHE E ENVIA EM MENOS DE UM SEGUNDO. HUMANO LEVA PELO MENOS ALGUNS SEGUNDOS
    // PARA ESCREVER. O FORMULARIO CARIMBA A HORA EM QUE FOI RENDERIZADO E COMPARAMOS AQUI.
    'tempo_minimo_segundos' => 4,      // ENVIO MAIS RAPIDO QUE ISSO E TRATADO COMO ROBO
    'tempo_maximo_segundos' => 86400,  // FORMULARIO ABERTO HA MAIS DE 24H E CONSIDERADO EXPIRADO

    // ─── SEGURA PARA MODERACAO (VIRA pending) ───
    'segurar' => [
        'com_link' => true,        // ⚠ QUALQUER LINK SEGURA O COMENTARIO. E A DEFESA MAIS IMPORTANTE
                                   //   DE TODAS: 90% DO SPAM DE COMENTARIO EXISTE PARA PLANTAR UM LINK.
                                   //   O LINK AINDA SAI COM rel="ugc nofollow noopener", MAS NEM CHEGA
                                   //   NA PAGINA SEM VOCE VER ANTES.
        'primeiro_do_autor' => false, // true = TODO NOME NOVO PASSA PELA FILA UMA VEZ (MAIS SEGURO, MAIS TRABALHO)
        'tudo_maiusculo' => true,     // TEXTO GRITADO QUASE SEMPRE E PROMOCAO
        'reincidente' => true,        // MESMO AUTOR (HASH DE IP) JA TEVE COMENTARIO MARCADO COMO SPAM
    ],

    // ─── REJEITA DIRETO (VIRA spam, NUNCA APARECE) ───
    'max_links' => 2, // MAIS QUE ISSO NUM SO COMENTARIO NAO E CONVERSA, E DESPEJO DE LINK

    // PALAVRAS QUE SO APARECEM EM SPAM DE COMENTARIO. COMPARACAO E SEM ACENTO E SEM CAIXA.
    // ⚠ CUIDADO AO ADICIONAR: PALAVRA COMUM AQUI DENTRO SILENCIA LEITOR DE VERDADE.
    // "loan", "deal" E "offer" FICARAM DE FORA DE PROPOSITO — SAO PALAVRAS NORMAIS NUM
    // SITE DE COMPRAS, ONDE "great deal on this vacuum" E UM COMENTARIO LEGITIMO.
    'palavras_bloqueadas' => [
        'viagra', 'cialis', 'levitra', 'tadalafil',           // FARMACIA FALSA
        'casino', 'betting site', 'slot machine', 'poker bonus', // APOSTA
        'porn', 'escort service', 'adult webcam', 'sex chat',  // ADULTO
        'payday loan', 'quick cash loan', 'debt relief program', // CREDITO PREDATORIO
        'crypto investment', 'bitcoin doubler', 'forex signals', 'binary options', // GOLPE FINANCEIRO
        'buy followers', 'cheap seo', 'seo services', 'guest post service', 'link building service', // SPAM DE SEO
        'recover stolen crypto', 'hire a hacker', 'recovery expert', // GOLPE DE RECUPERACAO
        'work from home earn', 'earn $', 'make money fast', // PIRAMIDE
        '[url=', '[/url]', '<a href',                       // BBCODE E HTML CRU: SO BOT ESCREVE ISSO
    ],

];
