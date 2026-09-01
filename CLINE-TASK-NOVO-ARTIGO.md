# Tarefa para o Cline: escrever um artigo novo

Cole o bloco da seção 2 no Cline. Troque `{{CATEGORIA}}`, `{{SLUG}}` e `{{TERMO_BUSCA}}`.

---

## 1. Antes de rodar — leia isto

⚠ **O navegador do Cline é um Chromium headless separado do seu Chrome.** Ele **não tem**
sua sessão da Amazon nem o endereço de entrega M4 6BD. Na prática:

- A Amazon costuma responder com captcha ("Enter the characters you see") a navegador headless.
- Mesmo passando, os preços e a disponibilidade podem não ser os que um leitor britânico vê,
  porque o CEP de entrega não está setado.

**Por isso a tarefa abaixo tem dois caminhos**, e o Cline escolhe sozinho:

| Caminho | Quando | Qualidade |
|---|---|---|
| **A — Cline coleta** | o navegador dele consegue abrir as fichas | boa, mas confira 2 ou 3 preços à mão |
| **B — você coleta** | a Amazon bloquear (o esperado) | melhor: sessão real, M4 6BD, preço certo |

No caminho B você usa o Claude Code com a extensão Claude in Chrome (que tem a sessão),
roda o extrator da seção 5 do `.clinerules`, e cola o JSON no Cline. Ele só escreve o seeder.

**Não deixe o Cline inventar dado.** ASIN, preço, nota e contagem de avaliação inventados
geram link de afiliado quebrado e número falso na página. A tarefa manda ele parar e pedir.

---

## 2. O prompt — copie daqui

```
Escreva um artigo novo para o ranked10. Leia .clinerules antes de começar; ele tem o
contexto completo do projeto.

CATEGORIA: {{CATEGORIA}}          (ex: kitchen)
SLUG: {{SLUG}}                    (ex: best-toaster)
TERMO DE BUSCA: {{TERMO_BUSCA}}   (ex: toaster 4 slice)

═══ PASSO 0 — ESTUDE O PADRÃO ═══
Leia database/seeders/lists/MiniChainsawsSeeder.php do início ao fim. É a referência
editorial e estrutural. Você vai escrever um arquivo com exatamente essa forma.
Leia também database/seeders/lists/_TemplateSeeder.php.example.
NÃO comece a escrever antes de ler os dois.

═══ PASSO 1 — COLETA ═══
Tente abrir com o browser:
  https://www.amazon.co.uk/s?k={{TERMO_BUSCA}}&rh=p_36%3A{PENCE_MINIMO}-

SE A AMAZON MOSTRAR CAPTCHA OU BLOQUEAR:
  PARE. Não tente contornar. Peça ao Felipe os dados no formato:
  [{"asin":"","title":"","price":"£00.00","rating":0.0,"reviews":0,"image":"","specs":[],"bullets":[]}]
  E espere. Não invente nada.

SE ABRIR:
  1. Extraia a grade de div[data-component-type="s-search-result"]
  2. ⚠ ABRA CADA FICHA INDIVIDUALMENTE. A grade quase nunca renderiza a contagem de
     avaliações dos mais vendidos — usar o número da grade já quase reprovou uma categoria
     boa. Use o extrator da seção 5 do .clinerules.
  3. Colete 12 a 15 produtos para poder descartar.
  4. Descarte: qualquer coisa que não seja o produto buscado (a busca contamina), e
     anúncios com menos de ~55 avaliações.
  5. CRITÉRIO DE APROVAÇÃO DA CATEGORIA: precisa de 3 ou 4 produtos com várias centenas
     de avaliações. Se não tiver, PARE e reporte "categoria reprovada por profundidade".

Reporte a coleta em tabela antes de escrever qualquer coisa, e espere meu ok.

═══ PASSO 2 — ORDENE PARA O LEITOR COMPRAR ═══
O #1 recebe o clique, então tem que ser a aposta mais segura: nota alta COM volume de
avaliação. Não abra com um produto de 60 avaliações e enterre o de 8.000 em terceiro.
Depois dos dois primeiros, use posições para casos de uso ("melhor com grelha", "maior
capacidade"), e o resto por nota e volume.

═══ PASSO 3 — ESCREVA O SEEDER ═══
Crie database/seeders/lists/XSeeder.php copiando a estrutura do MiniChainsawsSeeder.

REGRAS DE CONTEÚDO (inglês britânico):
- Título: responde à busca. SEM tese anexada, SEM física no final, SEM "UK".
- Intro, 2 primeiras frases: nomeie a recomendação e a opção barata. Nada de aula.
- summary: 1 parágrafo. body: 2 a 3 parágrafos. pros: 4-5. contras: 3-4.
- specs: 5 a 7 linhas comparando os dez ENTRE SI.
    verdict 'good' = melhor da lista nesse quesito
    verdict 'bad'  = pior da lista
    verdict 'neutral' = meio do pelotão
  Ficha só com verde não convence. Todo produto tem pelo menos um 'bad' ou 'neutral'.
- review_quotes: SEMPRE []. Regra absoluta: só aceita citação literal coletada da ficha.
  Nunca gere, resuma ou traduza uma avaliação. Citação inventada é depoimento falso.
- Um achado sobre o anúncio só entra na prosa se MUDAR A COMPRA (segurança, preço real,
  peso num produto vendido como leve). Curiosidade de ficha vai para o comentário do
  seeder, não para o texto.
- NÃO use markdown no texto do artigo. ** vira asterisco literal na página.
- Alegação de saúde: descreva, não endosse nem refute, mande falar com médico.
- Segurança: descreva o que cada anúncio publica. Não afirme nada sobre conformidade legal.

REGRAS TÉCNICAS (erro aqui quebra a página):
- meta_title ≤ 60 e meta_description ≤ 160. Meça com mb_strlen, não strlen (o £ são 2 bytes).
- focus_keyword preenchida.
- alt_text do produto #1 = a focus keyword exata (ele vira o og:image).
- affiliate_link = https://www.amazon.co.uk/dp/ASIN?tag=ranked10-21
- image normalizada para ._AC_SL1500_.jpg
- published_at: string fixa, no PASSADO, em UTC. Rode `date -u` e escolha uma hora anterior.
  NUNCA now(). Artigo com data no futuro devolve 404.
- NÃO inclua hero_image no array $article.
- Escreva o arquivo com a ferramenta de escrita de arquivo. NÃO use heredoc do bash:
  estoura com ENAMETOOLONG em arquivo desse tamanho.
- Aspas duplas dentro de string de aspas duplas: escreva \" desde o início.
- No comentário EDITE AQUI do topo, registre: data e local da coleta, busca usada,
  profundidade conferida, o critério de corte, e o que foi cortado do texto.

═══ PASSO 4 — REGISTRE E RODE ═══
1. Registre a classe em database/seeders/DatabaseSeeder.php.
   ⚠ Use a ferramenta de edição de arquivo. sed com \Database\Seeders falha no Git Bash.
2. php -l database/seeders/lists/XSeeder.php
3. php artisan db:seed --class="Database\Seeders\Lists\XSeeder" --force

═══ PASSO 5 — VERIFIQUE ═══
Rode a query de verificação da seção 6 do .clinerules com o slug do artigo novo.
Todos estes têm que passar:
  n=10  semAlt=0  dup=0  mt≤60  md≤160  fut=nao

Depois abra http://ranked10-app.test/{{CATEGORIA}}/{{SLUG}} e confirme status 200.
Confira que as 10 imagens da Amazon carregam (HEAD em cada URL).

═══ NÃO FAÇA ═══
- NÃO rode npm run build (não mexemos em view nem CSS).
- NÃO rode migrate.
- NÃO faça commit nem push. Deixe para eu revisar.
- NÃO mexa em nenhum dos 78 artigos existentes.
- NÃO invente ASIN, preço, nota ou contagem de avaliação. Se faltar dado, pare e pergunte.

Ao terminar, reporte em no máximo 10 linhas: a ordem final com nota e nº de avaliações,
o resultado da verificação, e qualquer coisa que você teve que decidir sozinho.
```

---

## 3. Categoria sugerida para o primeiro teste

**Torradeira** (`kitchen`, faixa de 5% de comissão) — não existe ainda no site, a busca é
limpa, e é decidida por especificação (largura da fenda, potência, níveis de tostagem,
função defrost), que é o terreno onde o site ganha.

```
CATEGORIA: kitchen
SLUG: best-toaster
TERMO DE BUSCA: toaster 4 slice
PENCE_MINIMO: 2500
```

Alternativas do mesmo tipo: processador de alimentos, mixer de mão, ferro a vapor.

⚠ **Evite:** air fryer, aspirador robô e cadeira de escritório. São terreno de experiência
de uso, e o site perde neles — está documentado no `.clinerules`.

---

## 4. O que conferir quando ele terminar

Antes de commitar, cheque **à mão**:

1. **Dois ou três preços e contagens de avaliação** contra a ficha real na Amazon. É o
   ponto onde um modelo mais barato erra primeiro.
2. **O `alt_text` do produto #1** é exatamente a focus keyword.
3. **A intro** abre nomeando a recomendação, não com uma explicação técnica.
4. **A ficha `specs`** tem `bad` e `neutral`, não só `good`.
5. **`review_quotes` está `[]`** em todos os dez.
6. **O `published_at`** está no passado em UTC.

Se passar, commit e sync como sempre. Se o artigo tiver ficado no molde antigo (física no
título, intro com aula), o problema é que ele não leu o `MiniChainsawsSeeder.php` — mande
ler e reescrever só o título, a intro e a conclusão.
