<?php

// PERFIS DOS AUTORES DO SITE. PARA ADICIONAR UM AUTOR NOVO, COPIE UM BLOCO E TROQUE OS VALORES.
// O CAMPO 'name' DEVE BATER EXATAMENTE COM O 'author' GRAVADO NO ARTIGO (TABELA articles).
// A FOTO FICA EM public/images/authors/<arquivo>; SE O ARQUIVO NAO EXISTIR, O COMPONENTE
// MOSTRA UM AVATAR COM AS INICIAIS AUTOMATICAMENTE.

return [

    [
        'name' => 'Felipe Iglesias',                                  // NOME EXIBIDO (DEVE BATER COM article->author)
        'slug' => 'felipe-iglesias',                                  // SLUG DO AUTOR (USO FUTURO: PAGINA DO AUTOR)
        'role' => 'Founder & Lead Reviewer',                          // CARGO/FUNCAO EXIBIDO ABAIXO DO NOME
        'photo' => 'images/authors/felipe-iglesias.jpg',              // CAMINHO DA FOTO DENTRO DE public/ (null = SO INICIAIS)
        'bio' => 'Felipe is the founder of ranked10 and the person behind every buying guide on the site. He spends his time digging through specs, customer reviews and real-world feedback so you do not have to, turning hours of research into clear, honest top 10 lists for UK shoppers. When he is not comparing air fryers or cordless mowers, he is tinkering with the technology that keeps ranked10 running.', // BIO (1-2 PARAGRAFOS)
        'socials' => [                                                // LINKS SOCIAIS (DEIXE '' PARA OCULTAR CADA UM)
            'website' => '',                                          // SITE PESSOAL
            'twitter' => '',                                          // PERFIL NO X/TWITTER (URL COMPLETA)
            'instagram' => '',                                        // PERFIL NO INSTAGRAM (URL COMPLETA)
            'linkedin' => '',                                         // PERFIL NO LINKEDIN (URL COMPLETA)
        ],
    ],

];
