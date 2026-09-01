/* ═══════════════════════════════════════════════════════════════════════════
   COLETOR DE FICHAS DA AMAZON — ranked10
   ═══════════════════════════════════════════════════════════════════════════

   COMO USAR
   1. Abra o SEU Chrome, logado na Amazon, com a entrega em M4 6BD.
   2. Vá para a página de busca com o filtro de preço, por exemplo:
        https://www.amazon.co.uk/s?k=toaster+4+slice&rh=p_36%3A2500-
   3. F12 → Console → cole este arquivo inteiro → Enter.
   4. Espere. Ele mostra o progresso e no fim copia o JSON para a área de transferência.
   5. Salve em storage/harvest/{slug}.json e mande o Cline ler.

   POR QUE ASSIM, E NAO UM SCRAPER
   Isto roda DENTRO da sua sessão, no seu navegador, buscando as mesmas paginas que
   voce abriria a mao — so que sem voce ter que clicar 15 vezes. Nao contorna nada:
   nao troca user-agent, nao usa proxy, nao resolve captcha, nao roda headless.
   Se a Amazon pedir captcha, ele PARA e avisa.

   ⚠ NAO AUMENTE O LIMITE NEM DIMINUA O DELAY. Raspagem em volume fere as Condicoes de
   Uso e o contrato de Associados, e a conta de Associados e o que sustenta o site.
   Quinze fichas por artigo e a mesma ordem de grandeza de uma pesquisa manual.
   ═══════════════════════════════════════════════════════════════════════════ */

(async () => {
  const LIMITE = 15;        // TETO DE FICHAS POR COLETA. NAO AUMENTAR.
  const DELAY_MS = 1500;    // PAUSA ENTRE FICHAS. NAO DIMINUIR.

  const espera = (ms) => new Promise((r) => setTimeout(r, ms));
  const log = (...a) => console.log('%c[ranked10]', 'color:#be1627;font-weight:bold', ...a);

  // ─── 1. ASINS DA GRADE DE BUSCA ───
  const cartoes = [...document.querySelectorAll('div[data-component-type="s-search-result"]')];
  if (!cartoes.length) {
    console.error('[ranked10] Nenhum resultado na pagina. Voce esta na pagina de BUSCA?');
    return;
  }

  const entrega = document.querySelector('#glow-ingress-line2')?.innerText.trim() || '(nao detectado)';
  log('Entrega:', entrega);
  if (!/M4\s*6/i.test(entrega)) {
    console.warn('[ranked10] ⚠ A entrega NAO parece ser M4 6BD. Precos e disponibilidade podem nao bater com o que um leitor britanico ve. Ajuste no header antes de continuar.');
  }

  const asins = [...new Set(cartoes.map((c) => c.getAttribute('data-asin')).filter(Boolean))].slice(0, LIMITE);
  log(`${cartoes.length} resultados na grade, ${asins.length} ASINs unicos a coletar.`);
  log('⚠ A grade quase nunca renderiza a contagem de avaliacoes. Por isso abrimos cada ficha.');

  // ─── 2. EXTRATOR — RODA SOBRE O HTML DE UMA FICHA ───
  const extrai = (doc, asin) => {
    const q = (sel) => doc.querySelector(sel);
    const qa = (sel) => [...doc.querySelectorAll(sel)];

    const li = q('#landingImage');
    let imagem = li?.getAttribute('data-old-hires') || li?.getAttribute('src') || '';
    imagem = imagem.replace(/\._[^.]*_\./, '._AC_SL1500_.');   // NORMALIZA PARA 1500px

    const precos = qa('.a-price .a-offscreen')
      .map((e) => e.textContent.trim())
      .filter((s) => /^£\d/.test(s));

    const contagem = q('#acrCustomerReviewText')?.textContent.trim() || '';
    const nota = q('#acrPopover')?.getAttribute('title') || '';

    return {
      asin,
      url: `https://www.amazon.co.uk/dp/${asin}?tag=ranked10-21`,   // JA COM A TAG
      title: q('#productTitle')?.innerText.trim() || null,
      price: precos[0] || null,
      rating: parseFloat(nota) || null,
      reviews: parseInt(contagem.replace(/[^\d]/g, ''), 10) || null,
      image: imagem || null,
      // AS DUAS FONTES: A TABELA DE ESPECIFICACOES **E** OS BULLETS. AS CONTRADICOES
      // QUASE SEMPRE ESTAO ENTRE AS DUAS.
      specs: qa('#productOverview_feature_div tr')
        .map((r) => [...r.querySelectorAll('td,th')].map((c) => c.innerText.trim()).join(': '))
        .slice(0, 12),
      details: qa('table.prodDetTable tr')
        .map((r) => r.innerText.trim().replace(/\s+/g, ' '))
        .filter((x) => x.length < 90)
        .slice(0, 12),
      // .normalize('NFKC') E OBRIGATORIO: parte dos anuncios escreve bullets em Unicode
      // matematico bold e sem isso o texto chega ilegivel.
      bullets: qa('#feature-bullets li span.a-list-item')
        .map((x) => x.innerText.trim().normalize('NFKC').slice(0, 300))
        .filter(Boolean),
      // AVALIACOES REAIS. SO O QUE A PROPRIA PAGINA JA RENDERIZA.
      // ⚠ ESTE TEXTO SO PODE SER USADO LITERALMENTE. NUNCA REESCREVER.
      quotes: qa('[data-hook="review"]').slice(0, 6).map((r) => ({
        title: r.querySelector('[data-hook="review-title"] span:last-child')?.innerText.trim() || null,
        rating: parseFloat(r.querySelector('[data-hook="review-star-rating"] span')?.innerText) || null,
        author: r.querySelector('.a-profile-name')?.innerText.trim() || null,
        date: r.querySelector('[data-hook="review-date"]')?.innerText.replace(/^.*on /, '').trim() || null,
        verified: !!r.querySelector('[data-hook="avp-badge"]'),
        text: r.querySelector('[data-hook="review-body"]')?.innerText.trim().normalize('NFKC').slice(0, 320) || null,
      })).filter((x) => x.text),
    };
  };

  // ─── 3. PERCORRE AS FICHAS ───
  const resultados = [];
  const falhas = [];

  for (let i = 0; i < asins.length; i++) {
    const asin = asins[i];
    try {
      // MESMA ORIGEM, MESMOS COOKIES, MESMA SESSAO. NENHUM CABECALHO FORJADO.
      const resposta = await fetch(`https://www.amazon.co.uk/dp/${asin}`, { credentials: 'include' });

      if (!resposta.ok) { falhas.push(`${asin} (HTTP ${resposta.status})`); continue; }

      const html = await resposta.text();

      // SE A AMAZON DEVOLVER CAPTCHA, PARA. NAO INSISTE, NAO CONTORNA.
      if (/api-services-support@amazon\.com|Type the characters you see|Enter the characters you see/i.test(html)) {
        console.error('[ranked10] ⛔ A Amazon pediu verificacao. PARANDO.');
        console.error('[ranked10] Resolva o captcha numa aba normal, espere alguns minutos e rode de novo.');
        break;
      }

      const doc = new DOMParser().parseFromString(html, 'text/html');
      const item = extrai(doc, asin);

      if (!item.title) { falhas.push(`${asin} (sem titulo — pagina diferente do esperado)`); continue; }

      resultados.push(item);
      log(`${i + 1}/${asins.length}  ${item.reviews ?? '?'} aval.  ${item.rating ?? '?'}★  ${item.price ?? '?'}  ${item.title.slice(0, 58)}`);
    } catch (e) {
      falhas.push(`${asin} (${e.message})`);
    }

    if (i < asins.length - 1) await espera(DELAY_MS);   // RITMO HUMANO, DE PROPOSITO
  }

  // ─── 4. RESUMO E SAIDA ───
  const ordenado = [...resultados].sort((a, b) => (b.reviews || 0) - (a.reviews || 0));

  console.log('\n');
  log(`Coletadas ${resultados.length} fichas. Falhas: ${falhas.length}`);
  if (falhas.length) console.warn('[ranked10] Falharam:', falhas);

  console.log('\n%cPROFUNDIDADE (o criterio que aprova ou reprova a categoria)', 'font-weight:bold');
  console.table(ordenado.map((x) => ({
    asin: x.asin, avaliacoes: x.reviews, nota: x.rating, preco: x.price,
    citacoes: x.quotes.length, produto: (x.title || '').slice(0, 50),
  })));

  const acimaDe300 = ordenado.filter((x) => (x.reviews || 0) >= 300).length;
  if (acimaDe300 >= 3) {
    log(`✅ CATEGORIA APROVADA: ${acimaDe300} produtos com 300+ avaliacoes.`);
  } else {
    console.warn(`[ranked10] ⚠ CATEGORIA FRACA: so ${acimaDe300} produto(s) com 300+ avaliacoes. O padrao pede 3 ou 4. Considere reprovar.`);
  }

  const saida = JSON.stringify({
    coletado_em: new Date().toISOString(),
    entrega: entrega,
    busca: location.href,
    total: resultados.length,
    produtos: ordenado,
  }, null, 2);

  try {
    await navigator.clipboard.writeText(saida);
    log('📋 JSON copiado para a area de transferencia. Cole em storage/harvest/{slug}.json');
  } catch {
    log('Nao consegui copiar automaticamente. O JSON esta em window.__ranked10 — rode: copy(window.__ranked10)');
  }
  window.__ranked10 = saida;
})();
