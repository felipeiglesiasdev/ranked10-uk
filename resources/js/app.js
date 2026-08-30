import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
window.Alpine = Alpine;
Alpine.plugin(collapse);
Alpine.start();

// ═══════════════════════════════════════════════════════════════════════════
// ═══ CARREGAMENTO PREGUICOSO DOS MODULOS PESADOS ═══
//
// O BUNDLE PRINCIPAL FICA SO COM O ALPINE. OS DOIS MODULOS ABAIXO SAO CHUNKS SEPARADOS,
// BAIXADOS SO QUANDO O VISITANTE DA O PRIMEIRO SINAL DE QUE VAI PRECISAR DELES.
// ═══════════════════════════════════════════════════════════════════════════

// ─── 1. MEGA MENU: BAIXA NA PRIMEIRA INTENCAO DE ABRIR O MENU ───
// GATILHOS: MOUSE SOBRE O HEADER, FOCO DE TECLADO (TAB) OU TOQUE. QUEM CHEGA DE BUSCA, LE O
// ARTIGO E VAI EMBORA SEM ENCOSTAR NO MENU NUNCA BAIXA ESTE CHUNK NEM O JSON DE /nav/menu.
const cabecalho = document.querySelector('[data-nav-root]'); // O <header> DO SITE

if (cabecalho) { // TODA PAGINA TEM, MAS A GUARDA MANTEM O SCRIPT SEGURO SE O LAYOUT MUDAR
    // 'click' ESTA NA LISTA PORQUE pointerenter NAO EXISTE EM TELA SENSIVEL AO TOQUE E NAO
    // DISPARA EM NAVEGACAO POR TECLADO SEM MOUSE. SEM ELE, QUEM ABRE O MENU PELO CHEVRON NUM
    // CELULAR NUNCA BAIXARIA O CHUNK.
    const gatilhos = ['pointerenter', 'focusin', 'touchstart', 'click']; // SINAIS DE INTENCAO DE USAR O MENU

    const carregaMenu = () => { // BAIXA O CHUNK E O INICIA
        gatilhos.forEach((evento) => cabecalho.removeEventListener(evento, carregaMenu)); // SOLTA OS OUVINTES
        import('./megamenu.js').then((modulo) => modulo.iniciar()); // IMPORTA E LIGA
    };

    gatilhos.forEach((evento) => cabecalho.addEventListener(evento, carregaMenu, { passive: true, once: true })); // ESCUTA UMA VEZ CADA
}

// ─── 2. COMENTARIOS: BAIXA QUANDO O LEITOR CHEGA PERTO DO FIM DO ARTIGO ───
// O rootMargin DE 400px ANTECIPA O DOWNLOAD O SUFICIENTE PARA O FORMULARIO JA ESTAR FUNCIONAL
// QUANDO ELE CHEGAR, SEM CUSTAR NADA A QUEM NUNCA ROLA ATE LA.
const secaoDeComentarios = document.querySelector('[data-comments-section]'); // SO EXISTE EM PAGINA DE ARTIGO

if (secaoDeComentarios) { // A PAGINA TEM COMENTARIOS
    const carregaComentarios = () => import('./comments.js').then((modulo) => modulo.iniciar()); // BAIXA O CHUNK E O INICIA

    if ('IntersectionObserver' in window) { // NAVEGADOR MODERNO: ESPERA O LEITOR CHEGAR PERTO
        const observador = new IntersectionObserver((entradas, self) => {
            if (entradas.some((entrada) => entrada.isIntersecting)) { // A SECAO ENTROU NA JANELA (COM A MARGEM)
                self.disconnect(); // UMA VEZ SO
                carregaComentarios(); // BAIXA E INICIA O MODULO
            }
        }, { rootMargin: '400px 0px' }); // COMECA A BAIXAR 400px ANTES DE APARECER

        observador.observe(secaoDeComentarios); // PASSA A OBSERVAR A SECAO
    } else { // NAVEGADOR SEM IntersectionObserver: CARREGA DEPOIS DE TUDO, SEM DISPUTAR COM O LCP
        window.addEventListener('load', carregaComentarios, { once: true }); // CARREGA NO load
    }
}
