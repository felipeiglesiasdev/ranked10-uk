import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
window.Alpine = Alpine;
Alpine.plugin(collapse);
Alpine.start();

// ═══════════════════════════════════════════════════════════════════════════
// ═══ CARREGAMENTO PREGUICOSO DO MODULO DE COMENTARIOS ═══
//
// O CHUNK ./comments.js (E, DENTRO DELE, O SCRIPT DO CLOUDFLARE TURNSTILE) SO E BAIXADO
// QUANDO O LEITOR SE APROXIMA DA SECAO DE COMENTARIOS, LA NO FIM DO ARTIGO.
// O rootMargin DE 400px ANTECIPA O DOWNLOAD O SUFICIENTE PARA O FORMULARIO JA ESTAR
// FUNCIONAL QUANDO ELE CHEGAR, SEM CUSTAR NADA A QUEM NUNCA ROLA ATE LA.
// ═══════════════════════════════════════════════════════════════════════════

const secaoDeComentarios = document.querySelector('[data-comments-section]'); // SECAO DE COMENTARIOS DA PAGINA (SO EXISTE EM ARTIGO)

if (secaoDeComentarios) { // A PAGINA TEM COMENTARIOS
    const carrega = () => import('./comments.js').then((modulo) => modulo.iniciar()); // BAIXA O CHUNK E INICIA

    if ('IntersectionObserver' in window) { // NAVEGADOR MODERNO: ESPERA O LEITOR CHEGAR PERTO
        const observador = new IntersectionObserver((entradas, self) => {
            if (entradas.some((entrada) => entrada.isIntersecting)) { // A SECAO ENTROU NA JANELA (COM A MARGEM)
                self.disconnect(); // UMA VEZ SO
                carrega(); // BAIXA E INICIA O MODULO
            }
        }, { rootMargin: '400px 0px' }); // COMECA A BAIXAR 400px ANTES DE APARECER

        observador.observe(secaoDeComentarios); // PASSA A OBSERVAR A SECAO
    } else { // NAVEGADOR SEM IntersectionObserver: CARREGA DEPOIS DE TUDO, SEM DISPUTAR COM O LCP
        window.addEventListener('load', carrega, { once: true }); // CARREGA NO load
    }
}
