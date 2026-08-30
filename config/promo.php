<?php

// ═══════════════════════════════════════════════════════════════════════════
// ═══ CHAMADAS PROMOCIONAIS DO SITE (EDITE AQUI) ═══
//
// ⚠ ENQUANTO 'url' ESTIVER VAZIA O BLOCO NAO E RENDERIZADO EM LUGAR NENHUM. E DE PROPOSITO:
// CTA COM LINK VAZIO VIRA BOTAO MORTO NA PAGINA, QUE E PIOR QUE NAO TER CTA. BASTA COLAR O
// CONVITE DO GRUPO ABAIXO PARA ELE APARECER EM TODOS OS ARTIGOS DE UMA VEZ.
// ═══════════════════════════════════════════════════════════════════════════

return [

    'whatsapp' => [

        // ⚠ COLE AQUI O CONVITE DO GRUPO (https://chat.whatsapp.com/XXXXXXXXXXXX)
        'url' => env('WHATSAPP_GROUP_URL', ''), // VAZIO = O BLOCO NAO APARECE

        'enabled' => env('WHATSAPP_CTA_ENABLED', true), // DESLIGA O BLOCO SEM APAGAR A URL

        // TEXTOS. EM INGLES BRITANICO PORQUE O PUBLICO DO SITE E DO REINO UNIDO.
        'eyebrow' => 'Free WhatsApp group',                                  // ETIQUETA PEQUENA NO TOPO
        'title' => 'Amazon deals, around the clock',                         // MANCHETE DO BLOCO
        'text' => 'Price drops and lightning deals posted the moment they go live. No spam, leave whenever you like.', // FRASE DE APOIO
        'button' => 'Join the group',                                        // TEXTO DO BOTAO
        'footnote' => 'Free to join · Leave any time',                       // LINHA FINAL, TIRA O ATRITO DE CLICAR
    ],

];
