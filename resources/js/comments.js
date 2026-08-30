// ═══════════════════════════════════════════════════════════════════════════
// ═══ JAVASCRIPT DOS COMENTARIOS — CHUNK CARREGADO SOB DEMANDA ═══
//
// ⚠ ESTE ARQUIVO NAO ENTRA NO BUNDLE PRINCIPAL. O app.js O IMPORTA COM import() DINAMICO
// SO QUANDO O LEITOR CHEGA PERTO DA SECAO DE COMENTARIOS. QUEM LE O ARTIGO E VAI EMBORA —
// A ESMAGADORA MAIORIA DO TRAFEGO — NUNCA BAIXA NADA DISTO, NEM O SCRIPT DA CLOUDFLARE.
//
// A LISTA DE COMENTARIOS NAO DEPENDE DAQUI: ELA JA VEM PRONTA NO HTML DO SERVIDOR.
// SEM JAVASCRIPT, O FORMULARIO AINDA ENVIA POR POST NORMAL (SO PERDE O CAPTCHA).
// ═══════════════════════════════════════════════════════════════════════════

const ESPERA_CAPTCHA_MS = 10000; // TETO DE ESPERA PELO TOKEN DO TURNSTILE ANTES DE DESISTIR
const URL_TURNSTILE = 'https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit'; // API DO TURNSTILE EM MODO EXPLICITO

let tokenCaptcha = null; // TOKEN DEVOLVIDO PELO WIDGET (NULO ATE O CAPTCHA RESOLVER)
let idDoWidget = null; // ID DO WIDGET RENDERIZADO, USADO PARA RESETAR APOS ERRO

export function iniciar() { // PONTO DE ENTRADA CHAMADO PELO app.js QUANDO A SECAO APARECE
    const form = document.querySelector('[data-comment-form]'); // FORMULARIO DE COMENTARIO DA PAGINA
    if (!form || form.dataset.iniciado === '1') { return; } // SEM FORMULARIO OU JA INICIADO: NAO FAZ NADA
    form.dataset.iniciado = '1'; // TRAVA PARA NAO INICIAR DUAS VEZES

    if (form.dataset.turnstileSitekey) { carregaTurnstile(form); } // SO CARREGA O CAPTCHA SE A CHAVE PUBLICA ESTIVER NO HTML

    form.addEventListener('submit', (evento) => aoEnviar(evento, form)); // INTERCEPTA O ENVIO
}

// ─── CLOUDFLARE TURNSTILE ───

function carregaTurnstile(form) { // INJETA O SCRIPT DA CLOUDFLARE E DESENHA O WIDGET
    const alvo = form.querySelector('[data-turnstile]'); // DIV RESERVADA NO BLADE
    if (!alvo) { return; } // SEM ALVO NAO HA ONDE DESENHAR

    const desenha = () => { // DESENHA O WIDGET ASSIM QUE A API ESTIVER DISPONIVEL
        if (!window.turnstile) { return; } // API AINDA NAO CARREGOU
        idDoWidget = window.turnstile.render(alvo, {
            sitekey: form.dataset.turnstileSitekey, // CHAVE PUBLICA VINDA DO .env VIA BLADE
            theme: 'light', // O SITE TEM FUNDO CLARO
            action: 'comment', // ROTULO QUE APARECE NAS METRICAS DO PAINEL DA CLOUDFLARE
            callback: (token) => { tokenCaptcha = token; }, // GUARDA O TOKEN QUANDO O DESAFIO PASSA
            'expired-callback': () => { tokenCaptcha = null; }, // TOKEN VENCE EM ~5 MIN: LIMPA PARA FORCAR NOVO
            'error-callback': () => { tokenCaptcha = null; }, // ERRO NO DESAFIO: LIMPA O TOKEN
        });
    };

    if (window.turnstile) { desenha(); return; } // SCRIPT JA ESTAVA NA PAGINA

    const script = document.createElement('script'); // TAG DO SCRIPT DA CLOUDFLARE
    script.src = URL_TURNSTILE; // ENDPOINT OFICIAL EM MODO EXPLICITO
    script.async = true; // NAO BLOQUEIA O PARSE
    script.defer = true; // EXECUTA DEPOIS DO DOCUMENTO
    script.onload = desenha; // DESENHA O WIDGET QUANDO A API CHEGAR
    document.head.appendChild(script); // ADICIONA A PAGINA (SO AGORA, NUNCA NO CARREGAMENTO INICIAL)
}

// ─── ENVIO ───

async function aoEnviar(evento, form) { // ROTINA QUE RODA NO SUBMIT DO FORMULARIO
    // O EVENTO submit SO DISPARA DEPOIS QUE O NAVEGADOR VALIDOU required/minlength/maxlength,
    // ENTAO A PARTIR DAQUI OS CAMPOS JA ESTAO PREENCHIDOS. SEGURAMOS O ENVIO PARA (1) ESPERAR O
    // CAPTCHA E (2) TROCAR O TOKEN CSRF POR UM FRESCO.
    evento.preventDefault(); // SEGURA O ENVIO NATIVO

    const botao = form.querySelector('[data-comment-submit]'); // BOTAO DE ENVIAR
    const rotulo = form.querySelector('[data-comment-submit-label]'); // TEXTO DENTRO DO BOTAO
    const textoOriginal = rotulo ? rotulo.textContent : ''; // GUARDA O ROTULO PARA RESTAURAR EM CASO DE FALHA

    if (botao) { botao.disabled = true; } // TRAVA O BOTAO CONTRA CLIQUE DUPLO
    if (rotulo) { rotulo.textContent = 'Posting…'; } // FEEDBACK IMEDIATO PARA O LEITOR

    if (form.dataset.turnstileSitekey && !(await esperaCaptcha())) { // O CAPTCHA NAO RESOLVEU A TEMPO
        if (botao) { botao.disabled = false; } // DESTRAVA PARA O LEITOR TENTAR DE NOVO
        if (rotulo) { rotulo.textContent = textoOriginal; } // RESTAURA O ROTULO
        if (idDoWidget !== null && window.turnstile) { window.turnstile.reset(idDoWidget); } // PEDE UM DESAFIO NOVO
        avisa(form, 'The security check did not finish. Please try again in a moment.'); // EXPLICA O QUE ACONTECEU
        return; // NAO ENVIA
    }

    await atualizaTokenCsrf(form); // GARANTE UM _token VALIDO ANTES DE SAIR

    // form.submit() NAO REDISPARA O EVENTO submit, ENTAO NAO HA RISCO DE LACO INFINITO AQUI.
    form.submit(); // ENVIA DE VERDADE (POST NORMAL, COM RECARGA DA PAGINA)
}

function esperaCaptcha() { // ESPERA O TOKEN DO TURNSTILE APARECER, COM TETO DE TEMPO
    if (tokenCaptcha) { return Promise.resolve(true); } // JA TEMOS O TOKEN

    return new Promise((resolve) => {
        const limite = Date.now() + ESPERA_CAPTCHA_MS; // MOMENTO EM QUE DESISTIMOS
        const tique = () => { // VERIFICA A CADA 150ms
            if (tokenCaptcha) { resolve(true); return; } // CHEGOU
            if (Date.now() > limite) { resolve(false); return; } // ESTOUROU O TEMPO
            setTimeout(tique, 150); // TENTA DE NOVO
        };
        tique(); // COMECA A VERIFICAR
    });
}

async function atualizaTokenCsrf(form) { // BUSCA UM TOKEN CSRF FRESCO NO SERVIDOR
    // POR QUE ISSO EXISTE: O _token IMPRESSO NO HTML ENVELHECE. UMA ABA ABERTA HA HORAS OU UMA
    // PAGINA SERVIDA DO CACHE DA CLOUDFLARE ENVIARIA UM TOKEN VELHO E O LEITOR LEVARIA UM 419
    // SEM ENTENDER NADA. UMA REQUISICAO DE ~30 BYTES NA HORA DO ENVIO ELIMINA ESSA CLASSE DE ERRO.
    const campo = form.querySelector('input[name="_token"]'); // CAMPO DO TOKEN NO FORMULARIO
    if (!campo || !form.dataset.tokenUrl) { return; } // SEM CAMPO OU SEM ENDPOINT: SEGUE COM O QUE TEM

    try {
        const resposta = await fetch(form.dataset.tokenUrl, { headers: { Accept: 'application/json' }, credentials: 'same-origin' }); // PEDE O TOKEN
        if (!resposta.ok) { return; } // SERVIDOR RECUSOU: SEGUE COM O TOKEN ORIGINAL
        const dados = await resposta.json(); // LE O JSON
        if (dados && dados.token) { campo.value = dados.token; } // SUBSTITUI PELO TOKEN NOVO
    } catch { // FALHA DE REDE
        // SILENCIO PROPOSITAL: SE O fetch FALHAR, O TOKEN ORIGINAL DA PAGINA AINDA TEM BOA CHANCE
        // DE SER VALIDO. MELHOR TENTAR ENVIAR DO QUE ABORTAR O COMENTARIO DO LEITOR.
    }
}

function avisa(form, mensagem) { // MOSTRA UM AVISO DENTRO DO FORMULARIO (SEM alert(), QUE E HOSTIL NO MOBILE)
    let caixa = form.querySelector('[data-comment-alert]'); // REAPROVEITA A CAIXA SE JA EXISTIR
    if (!caixa) {
        caixa = document.createElement('p'); // CRIA O PARAGRAFO DE AVISO
        caixa.setAttribute('data-comment-alert', ''); // MARCA PARA REAPROVEITAR NA PROXIMA VEZ
        caixa.setAttribute('role', 'alert'); // ANUNCIA AO LEITOR DE TELA
        caixa.className = 'rounded-lg border border-amber-200 bg-amber-50 p-3 text-xs font-medium text-amber-900'; // MESMO VISUAL DOS OUTROS AVISOS
        form.appendChild(caixa); // COLOCA NO FIM DO FORMULARIO
    }
    caixa.textContent = mensagem; // ESCREVE A MENSAGEM
}
