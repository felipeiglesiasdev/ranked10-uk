# ranked10.co.uk — contexto do projeto

> Documento de referência para agentes de código (Cline, Claude Code) e para retomar contexto.
> **Atualizado:** 31/08/2026 · **`main` = `f3e56a2`, sincronizado com `origin/main`.**
> Se este arquivo divergir do código, **o código vence** — confira antes de afirmar.

---

## 1. O que é

Site de guias de compra ("top 10") para o Reino Unido, monetizado por afiliados da Amazon.
Um artigo = uma lista ranqueada de 10 produtos de uma categoria.

| | |
|---|---|
| **Caminho** | `C:\laragon\www\ranked10-app` |
| **Stack** | Laravel 13 · MySQL · Tailwind v4 · Alpine.js · Vite |
| **Local** | `http://ranked10-app.test` (Laragon) |
| **Produção** | `https://www.ranked10.co.uk` — **atenção ao `www`**, não o apex |
| **Git** | `github.com/felipeiglesiasdev/ranked10-uk`, branch `main`, commit direto (sem PR) |
| **Tag de afiliado** | `ranked10-21` |

⚠ **O MySQL em `72.61.32.87` é o MESMO banco de local e produção.** Um `db:seed` rodado
na sua máquina aparece no site no ar imediatamente. `migrate` altera o schema de produção
na hora. Migration que só adiciona coluna nulável é segura; qualquer coisa destrutiva não é.

### Conteúdo atual

**78 artigos · 780 produtos · 0 comentários**

| Categoria | Slug | Artigos |
|---|---|---|
| Home | `home` | 16 |
| Tech | `tech` | 15 |
| Kitchen | `kitchen` | 14 |
| Home & Office | `home-office` | 10 |
| Fitness | `fitness` | 8 |
| Pet Supplies | `pet-supplies` | 8 |
| Garden | `garden` | 7 |

**Saúde:** 0 sem focus keyword · 0 com `meta_title` > 60 · 0 com `published_at` no futuro ·
2 com `meta_description` > 160 (`best-portable-blenders-uk` 181, `best-dehumidifier-for-home` 163) ·
10 produtos sem `alt_text` (todos em `best-portable-blenders-uk`) ·
150 links `amzn.to` antigos do SiteStripe (tag embutida no link curto, funcionam) ·
30 produtos com `specs` (3 artigos) · 0 com `review_quotes`.

---

## 2. Como um artigo funciona

**Cada artigo é um seeder PHP em `database/seeders/lists/`.** Não há CMS, não há admin.
Escrever um artigo = escrever um arquivo, registrar e rodar.

```
database/seeders/lists/MicrowavesSeeder.php     ← um arquivo por artigo
database/seeders/lists/_TemplateSeeder.php.example  ← copie deste
database/seeders/DatabaseSeeder.php             ← registre a classe aqui
```

### Fluxo completo

```bash
# 1. copie o template e escreva o seeder
# 2. registre em DatabaseSeeder.php (use Edit; sed com \Database\Seeders falha no Git Bash)
# 3. valide sintaxe
php -l database/seeders/lists/XSeeder.php
# 4. rode só esse seeder
php artisan db:seed --class="Database\Seeders\Lists\XSeeder" --force
# 5. verifique (query da seção 6)
# 6. commit
```

O seeder é **idempotente**: `updateOrCreate` pelo slug, e apaga/recria os produtos.
Rodar de novo não duplica nada.

⚠ **Trocar o slug cria um artigo NOVO.** O `updateOrCreate` casa pelo slug. Se precisar
mudar, apague o órfão e crie um 301 em `routes/web.php` (há um exemplo lá).

⚠ **`published_at` é sempre string fixa, nunca `now()`.** Re-rodar o seeder resetaria a
data e reembaralharia "guias recentes". A app roda em **UTC** — confira `date -u` antes de
escolher a hora, porque `ArticleController` devolve **404** para artigo com data no futuro.

⚠ **`hero_image` não vai no array `$article`.** O hero é derivado do produto #1, e o
`alt_text` do produto #1 tem que ser a focus keyword (ele vira o `og:image`).

### Anatomia do seeder

```php
$article = [
    'slug' => 'best-microwave',          // keyword em formato-url, SEM "uk"
    'title' => '...',                    // H1
    'meta_title' => '...',               // ≤ 60 chars (medir com mb_strlen, o £ são 2 bytes)
    'meta_description' => '...',         // ≤ 160 chars
    'focus_keyword' => 'best microwave', // vira o alt do hero
    'intro' => "...",                    // parágrafos separados por linha em branco
    'conclusion' => "...",
    'author' => 'Felipe Iglesias',       // tem que bater com config/authors.php
    'published_at' => '2026-08-30 18:00:00', // fixa, no passado, UTC
];

$products = [[
    'position' => 1,
    'name' => '...',                     // título encurtado da Amazon
    'price' => '£66.98',
    'rating' => 4.5,
    'reviews_count' => 8877,
    'image' => 'https://m.media-amazon.com/images/I/XXX._AC_SL1500_.jpg',
    'alt_text' => 'best microwave',      // o #1 recebe a focus keyword
    'affiliate_link' => 'https://www.amazon.co.uk/dp/ASIN?tag=ranked10-21',
    'summary' => '...',                  // 1 parágrafo, dentro do card
    'body' => "...",                     // 2-3 parágrafos, abaixo do card
    'pros' => ['...'],                   // 4-5 itens
    'contras' => ['...'],                // 3-4 itens
    'specs' => [                         // ficha comparativa (ver 4.2)
        ['label' => 'Capacity', 'value' => '23 litres', 'verdict' => 'good', 'note' => '...'],
    ],
    'review_quotes' => [],               // ver 4.3 — regra absoluta
]];
```

---

## 3. Arquitetura

### Rotas (`routes/web.php`)

```
GET   /                                   HomeController@index
GET   /about                              PageController@about
GET   /author/{slug}                      PageController@author
GET   /search                             SearchController@index
GET   /privacy-policy                     view: pages.privacy
GET   /sitemap.xml                        SitemapController@index
GET   /nav/menu                           NavigationController@menu     (JSON do mega menu)
GET   /comments/token                     CommentController@token       (CSRF fresco)
POST  /{category}/{article}/comments       CommentController@store
GET   /{category:slug}                    CategoryController@show       ← catch-all
GET   /{category:slug}/{article:slug}     ArticleController@show        ← catch-all
```

⚠ **Rota fixa nova TEM que ficar antes dos dois catch-all**, senão é engolida e dá 404.

### Models

- **`Category`** — slug único. `articles()`.
- **`Article`** — `getRouteKeyName() = 'slug'`. Scope `publicados()` (data preenchida e no
  passado). `products()` já vem ordenado por `position`. `comments()` e `comentariosPublicados()`.
- **`Product`** — casts de `pros`, `contras`, `specs`, `review_quotes` para array.
  Accessor `url` = link profundo `/{cat}/{art}#product-{position}`.
  **Scope `melhorAvaliados()`** — ranking bayesiano (fórmula do IMDB): puxa nota com pouca
  amostra para a média geral, então só sobe quem tem nota alta **e** volume.
- **`Comment`** — `body_html` escapa tudo e só depois monta `<p>`, `<br>`, `<a>`.
  Links saem com `rel="ugc nofollow noopener"` automático. **Nunca imprima `body` cru.**

### Serviços

| Arquivo | O que faz |
|---|---|
| `app/Services/FiltroDeComentario.php` | decide `approved` / `pending` / `spam` |
| `app/Services/Turnstile.php` | captcha; **desligado em `APP_ENV=local`** |
| `app/Support/Autores.php` | perfis de autor; resolve foto de CDN ou arquivo local |

### Views que importam

```
resources/views/articles/show.blade.php          ← a página do artigo, com o JSON-LD
resources/views/components/product-card.blade.php
resources/views/components/product-specs.blade.php    ← ficha comparativa
resources/views/components/product-reviews.blade.php  ← citações de avaliação
resources/views/components/comparison-table.blade.php
resources/views/components/utils/article-sidebar.blade.php
resources/views/components/utils/whatsapp-cta.blade.php
resources/views/components/utils/toc.blade.php
```

### O que roda em TODA página

`AppServiceProvider` tem um view composer em `layouts.app` que compartilha:
- `navCategories` — 7 categorias, **sem relacionamentos** (era com 76 artigos + 760 produtos até 30/08)
- `navPopularArticles` — 6 artigos recentes, para o rodapé

⚠ **Não volte a carregar artigos/produtos aqui.** Custava 91 KB por página (81% do HTML da
política de privacidade) e 836 models hidratados por requisição. O mega menu busca o próprio
conteúdo em `/nav/menu` sob demanda.

### JavaScript

`resources/js/app.js` carrega só o Alpine. Dois chunks preguiçosos:

| Chunk | Gatilho |
|---|---|
| `megamenu.js` | primeiro `pointerenter`/`focusin`/`touchstart`/`click` no `<header>` |
| `comments.js` | `IntersectionObserver` 400px antes da seção de comentários |

### SEO já implementado

- `ItemList` + `Product` + `Review` + `AggregateRating` no artigo
- `BlogPosting` com autor `Person`, publisher, datas e `comment`/`commentCount`
- `ProfilePage` + `Person` em `/author/{slug}` com `sameAs` (LinkedIn), `alumniOf`, `knowsAbout`
- `AboutPage` + `Organization` com `founder` em `/about`
- `Organization` + `WebSite` + `SearchAction` no layout
- `BreadcrumbList`, `SiteNavigationElement`
- **Grafo de entidade:** o mesmo `@id` `/author/felipe-iglesias#person` aparece no autor de
  todos os artigos, no `founder` da Organization e como `mainEntity` do ProfilePage. É isso
  que faz o Google entender que é uma pessoa só.

---

## 4. Padrão editorial (LEIA ANTES DE ESCREVER)

### 4.1 É um top 10, não um artigo de engenharia

Decisão do Felipe, 30/08/2026, palavras dele:
> *"é um top 10, apenas um top 10"* · *"o leitor precisa comprar, também somos um site que
> visa lucro! Se a gente enrolar muito pra convencer o leitor, ele rapa fora"*

**Referência a copiar: `database/seeders/lists/MiniChainsawsSeeder.php`.**

| Camada | O que carrega |
|---|---|
| Título / meta | A escolha. Sem tese anexada. |
| Intro, 2 primeiras frases | Nomeie a recomendação e a opção barata. |
| Card do produto | O que ele faz bem + a única ressalva que muda a compra. |
| Ficha `specs` | A comparação entre os dez. |
| Comentário do seeder | Tudo que foi cortado (matéria-prima do estudo de dados). |

**Regra de corte:** um achado só entra na prosa quando **muda a compra**.
- ✅ Entra: freio de corrente (segurança); peso publicado como 1,4 kg e 3,7 kg num produto
  vendido para uso com uma mão; o mesmo Samsung custando £21 a mais em outra cor.
- ❌ Fica no comentário: aritmética de watt-hora, `Unit Count: 1.0 square metre`,
  `Model Number: 1`, campo "Horsepower" preenchido com watt.

**Ordene para o leitor comprar.** O #1 tem que ser a aposta mais segura — ele é quem recebe
o clique. Não abra com um produto de 58 avaliações e enterre o de 8.877 em terceiro.

⚠ **NÃO recriar o "How we rank".** Foi apagado inteiro em `770c5c3` — bloco por artigo,
página `/how-we-rank`, coluna no banco, links, schema. Explicar metodologia antes da lista é
o oposto do que ele quer.

⚠ **19 artigos antigos ainda estão no molde velho** (física no título, intro abrindo com
aula). Estão listados na memória do projeto. **Não mexer sem perguntar.**

### 4.2 Ficha técnica (`specs`)

Compara os dez **entre si**, não julga o fabricante.

```php
['label' => 'Capacity', 'value' => '23 litres', 'verdict' => 'good', 'note' => '...']
```

- `good` = melhor da lista nesse quesito (borda verde)
- `bad` = pior da lista (borda vermelha)
- `neutral` = meio do pelotão (padrão)
- `note` = a frase curta que explica

Mire em 5 a 7 linhas. **Ficha só com verde não convence ninguém.**

### 4.3 Citações de avaliação (`review_quotes`)

```php
['text' => '', 'author' => '', 'rating' => 5, 'date' => '', 'title' => '', 'verified' => true]
```

⚠ **REGRA ABSOLUTA: só texto copiado literalmente de uma avaliação publicada na ficha.**
Nunca gerar, resumir, traduzir nem "melhorar". Citação inventada é depoimento falso, e este
bloco existe justamente para provar que o site não é texto de IA sobre produto que ninguém viu.

Está vazio nos 780 produtos. O extrator está no topo do `_TemplateSeeder.php.example`.

⚠ Estas citações **não entram no schema `Review`** de propósito — são de clientes da Amazon,
não nossas. Marcar como review do site é apropriação de avaliação de terceiro.

### 4.4 Escrita

- Inglês britânico. Variações da palavra-chave, não só a principal.
- Conectivos (however, meanwhile, in practice, by contrast) e escrita simples.
- Keyword na intro, no corpo e na conclusão.
- ❌ **Nada de markdown no texto do artigo** (`**negrito**` renderiza como asterisco literal).
- ❌ **Sem "UK" no título e na meta** (exceção: o artigo de Android).
- Alegação de saúde: descreva o que o aparelho faz, não endosse nem refute, mande falar com médico.
- Achado de segurança: descreva o que cada anúncio publica. **Não afirme nada sobre
  conformidade legal** de nenhum produto.

---

## 5. Coleta na Amazon

Precisa da extensão **Claude in Chrome** conectada e logada.
**Entrega tem que estar em M4 6BD (Manchester)** — confira `#glow-ingress-line2` antes.

1. Busca com filtro de preço: `amazon.co.uk/s?k=TERMO&rh=p_36%3A{PENCE}-`
2. Extraia a grade de `div[data-component-type="s-search-result"]`
3. **Abra cada ficha** — a grade quase nunca renderiza a contagem de avaliações
4. Normalize a imagem para `._AC_SL1500_.jpg` (use `data-old-hires`, caia para `src`)

### Extrator de ficha

```js
(()=>{const li=document.querySelector('#landingImage');
let im=li?.getAttribute('data-old-hires')||li?.src||'';
im=im.replace(/\._[^.]*_\./,'._AC_SL1500_.');
const px=[...document.querySelectorAll('.a-price .a-offscreen')].map(e=>e.textContent.trim()).filter(s=>/^£\d/.test(s));
return{t:document.querySelector('#productTitle')?.innerText.trim(),p:px[0],
r:document.querySelector('#acrPopover')?.title.trim(),
n:document.querySelector('#acrCustomerReviewText')?.textContent.trim(),i:im,
s:[...document.querySelectorAll('#productOverview_feature_div tr')].map(r=>[...r.querySelectorAll('td,th')].map(c=>c.innerText.trim()).join(': ')),
d:[...document.querySelectorAll('table.prodDetTable tr')].map(r=>r.innerText.trim().replace(/\s+/g,' ')).filter(x=>x.length<80).slice(0,11),
b:[...document.querySelectorAll('#feature-bullets li span.a-list-item')].map(x=>x.innerText.trim().normalize('NFKC').slice(0,280))}})()
```

### Extrator de avaliações

```js
(()=>[...document.querySelectorAll('[data-hook="review"]')].slice(0,8).map(r=>({
  title:r.querySelector('[data-hook="review-title"] span:last-child')?.innerText.trim(),
  rating:parseFloat(r.querySelector('[data-hook="review-star-rating"] span')?.innerText)||null,
  author:r.querySelector('.a-profile-name')?.innerText.trim(),
  date:r.querySelector('[data-hook="review-date"]')?.innerText.replace(/^.*on /,'').trim(),
  verified:!!r.querySelector('[data-hook="avp-badge"]'),
  text:r.querySelector('[data-hook="review-body"]')?.innerText.trim().normalize('NFKC').slice(0,320)
})))()
```

O `.normalize('NFKC')` é obrigatório nos dois — parte dos anúncios usa Unicode decorativo
e sem isso o texto chega ilegível.

### Critério de aprovação de categoria

**Profundidade de avaliação, lida na ficha.** Precisa de três ou quatro anúncios com várias
centenas de avaliações. Menos que isso, reprove a categoria.

⚠ **Nunca reprove pela grade de busca.** Ela frequentemente não renderiza a contagem dos
mais vendidos. Tractive, SEESII, Supstable, BenQ e Quntis apareceram em branco na grade e
tinham 4.826 / 8.877 / 4.327 / 4.504 / 850 na ficha.

**Sempre sinalizar:** produto com 0-2 avaliações · nota abaixo de 4.0 com amostra grande ·
contradição entre título, bullet e tabela · ASIN duplicado com o mesmo pool de avaliações e
preço diferente · produto fora da categoria buscada · unidade imperial em loja britânica.

**Categorias REPROVADAS — não re-testar:** aquecedor de pátio · triturador de jardim ·
remo ergométrico · kettlebell ajustável · adega/wine cooler.

**Categorias APROVADAS e já escritas:** micro-ondas (21.098 / 8.945 / 5.624 / 3.426) ·
câmera para pet (168.002 / 47.804 / 32.045 / 3.421 — os números Tapo são pool compartilhado
da linha, diga isso no texto).

⚠ **Não raspar em volume.** Fere as Condições de Uso e o contrato de Associados.

---

## 6. Verificação e deploy

### Query de verificação (rode depois de todo seeder)

```bash
php artisan tinker --execute="
\$a=DB::table('articles')->where('slug','SLUG')->first();
\$p=DB::table('products')->where('article_id',\$a->id)->get();
echo 'n='.\$p->count()
.' semAlt='.\$p->filter(fn(\$x)=>empty(\$x->alt_text))->count()
.' dup='.\$p->pluck('affiliate_link')->map(fn(\$l)=>substr(\$l,strpos(\$l,'/dp/')+4,10))->duplicates()->count()
.' mt='.mb_strlen(\$a->meta_title).' md='.mb_strlen(\$a->meta_description)
.' fut='.(\$a->published_at>now()?'SIM':'nao');"
```

⚠ A conta de `dup` só vale para links `/dp/`. Em artigo com `amzn.to` dá falso positivo.

### Checar imagens (o `curl` falha pelo sandbox, PowerShell não)

```powershell
$r = Invoke-WebRequest -Uri "http://ranked10-app.test/CAT/SLUG" -UseBasicParsing
$imgs = [regex]::Matches($r.Content, 'https://m\.media-amazon\.com/images/I/[^"]+_AC_SL1500_\.jpg') | ForEach-Object { $_.Value } | Select-Object -Unique
foreach ($i in $imgs) { try { $null = Invoke-WebRequest -Uri $i -Method Head -UseBasicParsing } catch { "QUEBRADA: $i" } }
```

### Deploy

```bash
git pull origin main && php artisan db:seed --force
```

Se o commit tocou em view, CSS ou `bootstrap/app.php`, **também**:

```bash
npm run build && php artisan view:clear && php artisan config:clear
```

⚠ **`npm run build` quebra em silêncio se esquecido.** O Tailwind varre os templates no
build, então classe que só existe em arquivo novo simplesmente não entra no CSS. A página
renderiza com o HTML certo e estilo nenhum, sem erro em lugar nenhum. Aconteceu duas vezes.

⚠ **Purge Everything na Cloudflare depois do deploy.** Home e páginas de categoria estão
cacheadas na borda e não mostram artigo novo até o TTL vencer.

---

## 7. Armadilhas conhecidas

| Armadilha | O que fazer |
|---|---|
| Heredoc do bash estoura em seeders (ENAMETOOLONG) | use a ferramenta Write |
| Aspas duplas dentro de string com aspas duplas | escreva `\"` desde o início; corrigir com `sed` duas vezes gera `\\"` |
| Apóstrofo em string PHP de aspas simples | escape ou use aspas duplas |
| `'chave': valor` em vez de `'chave' => valor` | erro de sintaxe silencioso ao ler |
| `mb_strlen`, não `strlen`, para medir metas | o `£` são 2 bytes |
| `sed` com `\Database\Seeders` falha no Git Bash | use a ferramenta Edit |
| `curl` para domínio externo às vezes retorna 000 | use PowerShell `Invoke-WebRequest` |
| Overflow mobile em 390px | só se mexer em view/CSS. Causa recorrente: item de grid com `min-width:auto` — use `min-w-0` e `line-clamp-1`, não `truncate` |

---

## 8. Convenções de código

- Comentários **EM MAIÚSCULAS**, na mesma linha do código
- SVG **inline** (Bootstrap Icons), nunca biblioteca de ícones
- Fonte **Poppins** via CDN R2
- **Mobile-first**
- Links de afiliado sempre `rel="sponsored nofollow" target="_blank"`
- ❌ **NÃO mexer** em `C:\Users\vgfmedical\Desktop\goodwolf-pipeline`

### Cores (`resources/css/app.css`)

```
--color-brand:         #be1627   vermelho principal
--color-brand-light:   #cd2137   hover
--color-ink:           #171717   preto (superfícies escuras)
--color-brand-on-dark: #e8556a   ⚠ o vermelho da marca dá 2,85:1 no preto e reprova no WCAG AA
```

---

## 9. Configuração

| Arquivo | Para quê |
|---|---|
| `config/authors.php` | perfil do autor; alimenta a página, a bio e o schema `Person` |
| `config/comments.php` | filtros de spam, limites, palavras bloqueadas |
| `config/promo.php` | CTA do grupo de WhatsApp |

### Variáveis de ambiente próprias (`.env`, gitignored)

```
TURNSTILE_SITE_KEY=      # captcha dos comentários
TURNSTILE_SECRET_KEY=
TURNSTILE_FORCE_LOCAL=   # true liga o captcha em dev também
WHATSAPP_GROUP_URL=      # vazio = o CTA não renderiza
WHATSAPP_CTA_ENABLED=
```

⚠ **Precisam ser setadas no servidor de produção.** Sem elas os recursos ficam invisíveis,
sem erro.

⚠ **Turnstile é travado por domínio.** Devolve erro **110200 (unknown domain)** em host que
não esteja na lista do painel da Cloudflare. Confirme que **`www.ranked10.co.uk`** está lá.

### Analytics

Só o GTM (`GTM-W6JNCFFC`) no `<head>`, com `noscript` após o `<body>`, ambos com guarda
`@unless (app()->environment('local'))`. O GA4 (`G-81KLERKV14`) é carregado pela tag do
Google **dentro do container** — não duplicar.

⚠ O GTM carrega com **atraso de 2 segundos** (primeira interação ou teto de 2s). Trade-off
aceito: `affiliate_click` é um Click trigger nativo, então clique antes do container subir
não é contado. **Se o volume cair no GA4, a causa é essa.**

### Cloudflare — território do Felipe, não mexer no código

Email Obfuscation desligado · Web Analytics desligado · Rocket Loader desligado (ligaria
quebraria o Alpine) · 3 Cache Rules.

❌ **Cache não vive no código.** Houve um middleware `CachePublicPages`, revertido a pedido
em `edd717e`. **Não recriar sem ele pedir.**

❌ **CSS bloqueante de 350ms mantido por decisão do Felipe.** Não propor de novo.

---

## 10. Comentários (UGC sem login)

Renderizados no servidor, então o Google indexa. Cinco defesas antes do insert: honeypot,
carimbo de tempo cifrado com a `APP_KEY`, rate limit por IP (minuto/hora/dia), Turnstile,
filtro de conteúdo.

Política **híbrida**: comentário limpo publica na hora; com link ou palavra bloqueada fica
pendente. O IP nunca é gravado em claro, só o SHA-256 salgado com a `APP_KEY`.

```bash
php artisan comments:moderate              # revisa a fila, interativo
php artisan comments:moderate --list       # só lista
php artisan comments:moderate --approve=12
php artisan comments:moderate --spam=12
php artisan comments:moderate --spam-queue # revisa o que o filtro marcou como spam
```

---

## 11. Pendências abertas

1. **Confirmar o prazo da conta de Associados no painel.** O programa dá janela limitada
   para as vendas qualificadoras; vencendo, a conta fecha. Possivelmente o mais urgente.
2. **Coletar `review_quotes`** — vazio nos 780 produtos.
3. **`best-portable-blenders-uk`**: 10 produtos sem `alt_text` + meta de 181 chars.
   `best-dehumidifier-for-home`: meta de 163.
4. **Os 19 artigos no molde antigo** — não mexer sem perguntar.
5. **Decisão: criar a 8ª categoria (Health & Beauty)?** `sad-lamp` está em `home` porque é
   uma luminária, mas é dispositivo de saúde. Escova de dentes elétrica e secador estão
   bloqueados pela mesma decisão.
6. **Estudo de dados dos erros de ficha da Amazon** — 250+ contradições documentadas em ~62
   categorias, nos comentários dos seeders. Rota mais rápida para link de imprensa.
7. **Medir tráfego de assistente de IA separado no GA4.**
8. **Divulgar link de afiliado em grupo de WhatsApp** normalmente exige que o canal esteja
   declarado na conta de Associados — o contrato limita os links aos sites e apps
   registrados. Confirmar antes de postar links com a tag no grupo.

### Ideias de próximos artigos

Filtro: sazonal **e** pergunta factual **e** profundidade decente (conferir na ficha).

- **Cluster de perguntas** em vez de lista — o caminho do `electroguide.co.uk`, o único
  concorrente que é ameaça real. Ele tem dez artigos sobre purificador de ar e **nenhum** é
  "best air purifier": são "CADR vs ACH", "HEPA H13 vs H14".
- Umidificador por capacidade (2L / 6L) — repete o modelo do cluster de microSD, que ranqueia.
- Power bank por capacidade (10.000 / 27.000mAh) — mas Tech paga pouco (1-2%).
- Escova de dentes elétrica — terreno forte, mas exige a 8ª categoria.

**Comissão muda a escolha:** Kitchen & Dining paga 5%, eletrônicos 1-2%. E o cookie da
Amazon dura 24 horas, então ciclo de decisão curto importa.
