// ═══════════════════════════════════════════════════════════════════════════
// ═══ MEGA MENU — CHUNK CARREGADO SOB DEMANDA ═══
//
// ⚠ NAO ENTRA NO BUNDLE PRINCIPAL. O app.js O IMPORTA COM import() DINAMICO NA PRIMEIRA
// INTENCAO DE ABRIR O MENU (hover, foco de teclado ou toque na barra de navegacao).
//
// DIVISAO DE TRABALHO COM O ALPINE:
//   ALPINE .. ABRE/FECHA O PAINEL. JA ESTA CARREGADO, ENTAO RESPONDE NO PRIMEIRO FRAME.
//   AQUI .... BUSCA OS DADOS E DESENHA O CONTEUDO DENTRO DO PAINEL.
// OS DOIS OUVEM O MESMO GESTO DO VISITANTE, ENTAO NUNCA SAEM DE SINCRONIA. ENQUANTO OS DADOS
// NAO CHEGAM, DESENHAMOS UM ESQUELETO — O MENU NUNCA ABRE VAZIO.
// ═══════════════════════════════════════════════════════════════════════════

const CHAVE_SESSAO = 'r10:nav:v1'; // CHAVE NO sessionStorage
const TTL_SESSAO = 10 * 60 * 1000; // 10 MINUTOS: TEMPO QUE O MENU FICA VALIDO DENTRO DA MESMA ABA

let dados = null; // { categories: [...] } DEPOIS QUE CHEGA
let buscando = null; // PROMESSA EM VOO, PARA NAO DISPARAR DUAS REQUISICOES
let ultimaCategoria = null; // ULTIMA CATEGORIA DESENHADA NO PAINEL (EVITA REDESENHAR IGUAL)

export function iniciar() { // PONTO DE ENTRADA CHAMADO PELO app.js
    const raiz = document.querySelector('[data-nav-root]'); // O <header>
    if (!raiz || raiz.dataset.navIniciado === '1') { return; } // SEM HEADER OU JA INICIADO
    raiz.dataset.navIniciado = '1'; // TRAVA PARA NAO INICIAR DUAS VEZES

    garanteDados(); // JA DISPARA A BUSCA: O VISITANTE ACABOU DE SINALIZAR QUE VAI ABRIR O MENU

    // ─── DESKTOP: HOVER, FOCO E CLIQUE NOS ITENS DA BARRA ───
    raiz.querySelectorAll('[data-nav-item]').forEach((item) => { // PERCORRE OS <li> DE CATEGORIA
        const id = Number(item.dataset.navItem); // ID DA CATEGORIA
        const pede = () => desenhaPainel(id); // FECHAMENTO QUE DESENHA ESTA CATEGORIA

        item.addEventListener('pointerenter', pede); // MOUSE POR CIMA
        item.addEventListener('focusin', pede); // NAVEGACAO POR TECLADO (TAB)
        item.addEventListener('click', pede); // CLIQUE NO CHEVRON (E NO TOQUE, EM TELA SENSIVEL)
    });

    // ─── MOBILE: A SANFONA SO PEDE O CONTEUDO QUANDO E ABERTA ───
    raiz.querySelectorAll('[data-nav-mobile-toggle]').forEach((botao) => { // PERCORRE OS BOTOES DA SANFONA
        botao.addEventListener('click', () => desenhaMobile(Number(botao.dataset.navMobileToggle))); // DESENHA A CATEGORIA PEDIDA
    });

    alcancaOGestoQueAbriu(raiz); // ATENDE O GESTO QUE CAUSOU ESTE CARREGAMENTO
}

function alcancaOGestoQueAbriu(raiz) { // DESENHA O PAINEL QUE O ALPINE JA ABRIU ANTES DESTE CHUNK EXISTIR
    // ⚠ SEM ISTO, O PRIMEIRO HOVER DO VISITANTE ABRE UM PAINEL VAZIO.
    // A SEQUENCIA E: O GESTO DISPARA O import() DINAMICO **E** O ALPINE ABRE O PAINEL, TUDO NO
    // MESMO INSTANTE. MAS O import() SO RESOLVE ALGUNS MILISSEGUNDOS DEPOIS, QUANDO O EVENTO
    // ORIGINAL JA PASSOU E OS OUVINTES REGISTRADOS ACIMA NUNCA O VIRAM. ENTAO, EM VEZ DE ESPERAR
    // O PROXIMO GESTO, PERGUNTAMOS AO ALPINE QUAL CATEGORIA ELE JA ABRIU E DESENHAMOS ELA.
    let id = null; // CATEGORIA A DESENHAR

    try { id = window.Alpine?.$data(raiz)?.aberto ?? null; } catch { id = null; } // ESTADO ATUAL DO COMPONENTE ALPINE

    if (id === null) { // ALPINE INDISPONIVEL OU AINDA SEM ESTADO
        const sobOCursor = raiz.querySelector('[data-nav-item]:hover'); // RECORRE AO CSS: QUEM ESTA SOB O MOUSE AGORA
        if (sobOCursor) { id = Number(sobOCursor.dataset.navItem); } // USA ESSA CATEGORIA
    }

    if (id !== null) { desenhaPainel(id); } // DESENHA, SE HOUVER ALGO ABERTO
}

// ─── DADOS ───

function garanteDados() { // BUSCA O JSON DO MENU UMA VEZ SO
    if (dados) { return Promise.resolve(dados); } // JA ESTA NA MEMORIA
    if (buscando) { return buscando; } // JA HA UMA REQUISICAO EM VOO

    const guardado = leDaSessao(); // TENTA O CACHE DA ABA ANTES DE IR A REDE
    if (guardado) { dados = guardado; return Promise.resolve(dados); } // NAVEGACAO ENTRE PAGINAS FICA INSTANTANEA

    buscando = fetch('/nav/menu', { headers: { Accept: 'application/json' } })
        .then((r) => (r.ok ? r.json() : Promise.reject(new Error('nav ' + r.status)))) // SO SEGUE SE O SERVIDOR RESPONDEU BEM
        .then((json) => { dados = json; gravaNaSessao(json); return json; }) // GUARDA NA MEMORIA E NA SESSAO
        .catch(() => { dados = { categories: [] }; return dados; }) // FALHA DE REDE: SEGUE VAZIO EM VEZ DE TRAVAR O MENU
        .finally(() => { buscando = null; }); // LIBERA A TRAVA

    return buscando; // DEVOLVE A PROMESSA
}

function leDaSessao() { // LE O MENU GUARDADO NESTA ABA
    // POR QUE sessionStorage E NAO localStorage: O MENU MUDA QUANDO UM ARTIGO NOVO E PUBLICADO.
    // PRESO A SESSAO DA ABA, ELE NUNCA FICA VELHO ALEM DA VISITA — E O TTL CORTA MAIS CEDO AINDA.
    try {
        const cru = sessionStorage.getItem(CHAVE_SESSAO); // PODE LANCAR EM ABA ANONIMA OU COM DADOS BLOQUEADOS
        if (!cru) { return null; } // NADA GUARDADO
        const { t, d } = JSON.parse(cru); // CARIMBO DE TEMPO E DADOS
        return Date.now() - t < TTL_SESSAO ? d : null; // SO VALE DENTRO DO TTL
    } catch { return null; } // QUALQUER PROBLEMA: TRATA COMO SE NAO HOUVESSE CACHE
}

function gravaNaSessao(json) { // GUARDA O MENU NESTA ABA
    try { sessionStorage.setItem(CHAVE_SESSAO, JSON.stringify({ t: Date.now(), d: json })); } catch { /* COTA CHEIA OU BLOQUEADA: SEGUIMOS SEM CACHE */ }
}

function categoria(id) { // ACHA UMA CATEGORIA NOS DADOS CARREGADOS
    return dados?.categories?.find((c) => c.id === id) || null; // NULO SE AINDA NAO CHEGOU
}

// ─── DESKTOP ───

function desenhaPainel(id) { // DESENHA O PAINEL DA CATEGORIA PEDIDA
    const alvo = document.querySelector('[data-nav-panel-body]'); // CORPO DO PAINEL COMPARTILHADO
    if (!alvo) { return; } // PAINEL NAO EXISTE NESTA PAGINA

    const cat = categoria(id); // DADOS DESTA CATEGORIA

    if (!cat) { // OS DADOS AINDA NAO CHEGARAM
        if (ultimaCategoria !== 'esqueleto') { alvo.innerHTML = esqueleto(); ultimaCategoria = 'esqueleto'; } // MOSTRA O ESQUELETO UMA VEZ
        garanteDados().then(() => { if (categoria(id)) { ultimaCategoria = null; desenhaPainel(id); } }); // REDESENHA QUANDO CHEGAREM
        return; // SAI E ESPERA
    }

    if (ultimaCategoria === id) { return; } // JA ESTA DESENHADA: NAO REFAZ O DOM A TOA
    ultimaCategoria = id; // MARCA A CATEGORIA ATUAL

    const restantes = cat.count - cat.articles.length; // QUANTOS GUIAS NAO COUBERAM NO PAINEL

    alvo.innerHTML = `
        <div class="grid gap-7 lg:grid-cols-12">
            <div class="lg:col-span-3">
                <p class="text-xs font-bold uppercase tracking-wider text-brand">${esc(cat.name)}</p>
                <p class="mt-1 text-2xl font-extrabold tracking-tight text-slate-900">${cat.count} ${cat.count === 1 ? 'guide' : 'guides'}</p>
                ${cat.description ? `<p class="mt-2 text-sm leading-relaxed text-slate-500">${esc(cat.description)}</p>` : ''}
                <a href="${esc(cat.url)}" class="mt-4 inline-flex items-center gap-1.5 rounded-full bg-ink px-4 py-2 text-sm font-bold text-white transition hover:bg-slate-700">
                    View all ${esc(cat.name)}
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                </a>
            </div>

            <div class="lg:col-span-9">
                <div class="grid gap-2 sm:grid-cols-2 xl:grid-cols-3">
                    ${cat.articles.map(cartaoDeArtigo).join('')}
                </div>
                ${restantes > 0 ? `<a href="${esc(cat.url)}" class="mt-3 inline-block text-sm font-semibold text-brand hover:text-brand-light">+ ${restantes} more ${restantes === 1 ? 'guide' : 'guides'} in ${esc(cat.name)}</a>` : ''}
            </div>
        </div>`;
}

function cartaoDeArtigo(artigo) { // UM CARTAO DE GUIA DENTRO DO PAINEL
    return `
        <a href="${esc(artigo.url)}" class="group flex min-w-0 items-center gap-3 rounded-xl border border-transparent p-2.5 transition hover:border-slate-200 hover:bg-slate-50">
            ${miniatura(artigo)}
            <span class="min-w-0 flex-1">
                <span class="block text-sm font-bold leading-snug text-slate-900 line-clamp-2 group-hover:text-brand">${esc(artigo.title)}</span>
                ${artigo.updated ? `<span class="mt-0.5 block text-xs text-slate-400">Updated ${esc(artigo.updated)}</span>` : ''}
            </span>
        </a>`;
}

function miniatura(artigo) { // FOTO DO PRODUTO #1 DO GUIA, OU UM PLACEHOLDER
    if (!artigo.image) { // GUIA SEM FOTO
        return '<span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-300"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/><path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/></svg></span>'; // PLACEHOLDER
    }
    // width/height RESERVAM O ESPACO PARA A IMAGEM NAO EMPURRAR O TEXTO AO CARREGAR.
    return `<img src="${esc(artigo.image)}" alt="" width="48" height="48" loading="lazy" decoding="async" class="h-12 w-12 shrink-0 rounded-lg border border-slate-100 bg-white object-contain">`; // alt VAZIO: A IMAGEM E DECORATIVA, O TITULO AO LADO JA DIZ TUDO
}

function esqueleto() { // PLACEHOLDER CINZA ENQUANTO OS DADOS NAO CHEGAM
    const cartao = '<div class="flex items-center gap-3 p-2.5"><div class="h-12 w-12 shrink-0 animate-pulse rounded-lg bg-slate-100"></div><div class="min-w-0 flex-1 space-y-2"><div class="h-3 w-4/5 animate-pulse rounded bg-slate-100"></div><div class="h-3 w-2/5 animate-pulse rounded bg-slate-100"></div></div></div>';

    return `
        <div class="grid gap-7 lg:grid-cols-12" aria-hidden="true">
            <div class="lg:col-span-3 space-y-3">
                <div class="h-3 w-20 animate-pulse rounded bg-slate-100"></div>
                <div class="h-6 w-28 animate-pulse rounded bg-slate-100"></div>
                <div class="h-3 w-full animate-pulse rounded bg-slate-100"></div>
                <div class="h-3 w-3/4 animate-pulse rounded bg-slate-100"></div>
            </div>
            <div class="lg:col-span-9">
                <div class="grid gap-2 sm:grid-cols-2 xl:grid-cols-3">${cartao.repeat(6)}</div>
            </div>
        </div>`;
}

// ─── MOBILE ───

function desenhaMobile(id) { // PREENCHE A SANFONA DE UMA CATEGORIA NO MOBILE
    const alvo = document.querySelector(`[data-nav-mobile-body="${id}"]`); // CORPO DA SANFONA DESTA CATEGORIA
    if (!alvo || alvo.dataset.pronto === '1') { return; } // SEM ALVO OU JA PREENCHIDO

    const cat = categoria(id); // DADOS DESTA CATEGORIA

    if (!cat) { // AINDA NAO CHEGARAM
        alvo.innerHTML = '<p class="px-3 py-2 text-sm text-slate-400">Loading guides…</p>'; // AVISO DE CARREGAMENTO
        garanteDados().then(() => desenhaMobile(id)); // TENTA DE NOVO QUANDO CHEGAREM
        return; // SAI E ESPERA
    }

    alvo.dataset.pronto = '1'; // MARCA COMO PREENCHIDO (NAO PRECISA REDESENHAR)
    const restantes = cat.count - cat.articles.length; // QUANTOS GUIAS NAO COUBERAM

    alvo.innerHTML = `
        <div class="space-y-0.5">
            ${cat.articles.map((a) => `
                <a href="${esc(a.url)}" class="flex min-w-0 items-center gap-3 rounded-md px-3 py-2 hover:bg-slate-50">
                    ${miniatura(a)}
                    <span class="min-w-0 flex-1 text-sm leading-snug text-slate-600 line-clamp-2">${esc(a.title)}</span>
                </a>`).join('')}
            ${restantes > 0 ? `<a href="${esc(cat.url)}" class="block px-3 py-2 text-sm font-semibold text-brand">+ ${restantes} more in ${esc(cat.name)}</a>` : ''}
        </div>`;
}

// ─── UTILITARIO ───

function esc(valor) { // ESCAPA TEXTO ANTES DE ENTRAR NO innerHTML
    // OS DADOS VEM DO NOSSO PROPRIO ENDPOINT, MAS ESCAPAR AQUI E BARATO E FECHA A PORTA PARA
    // SEMPRE: NO DIA EM QUE UM TITULO DE ARTIGO TIVER UMA ASPA OU UM E COMERCIAL, NADA QUEBRA.
    return String(valor ?? '').replace(/[&<>"']/g, (c) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' })[c]); // TROCA OS CINCO CARACTERES PERIGOSOS
}
