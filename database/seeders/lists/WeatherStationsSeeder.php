<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class WeatherStationsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE ESTACOES METEOROLOGICAS DOMESTICAS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=weather+station&rh=p_36%3A2500-  (24 ASINS, 15 FICHAS ABERTAS)
        // CATEGORIA GARDEN. SAZONAL: EVERGREEN, INTERESSE SOBE COM TEMPO EXTREMO (TEMPESTADE/GEADA).
        //
        // PADRAO EDITORIAL NOVO (30/08): E UM TOP 10, NAO UM ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── EIXOS DE COMPRA / TERRENO DE IA ───
        //   SIMPLES (temp/umidade in+out, barometro, icone de previsao, relogio) ~£30 x MULTI-SENSOR (5/6/7-in-1: + vento/chuva/UV) ~£70+.
        //   O "ICONE DE PREVISAO" DE TODOS OS CONSOLES E PALPITE PELA TENDENCIA BAROMETRICA 12-24h, NAO PREVISAO DO MET OFFICE. → INTRO (marketing x realidade).
        //   WIFI/APP (Ambient, Ecowitt, Tempest — sobe p/ Weather Underground/rede) x SO CONSOLE (VEVOR "NO WIFI").
        //   RELOGIO RADIO: MSF (UK, Anthorn) x DCF (Alemanha) — DCF chega no UK mas MSF e o "certo" p/ UK.
        //   TEMPEST: SEM PARTES MOVEIS (vento sonico, chuva haptica) = nada p/ travar, mas chuva haptica e menos precisa em aguaceiro. NOTA EQUILIBRADA.
        //   SENSORPUSH: SO SENSOR + APP, SEM DISPLAY — MONITORA UM ESPACO (estufa/geladeira), NAO O TEMPO TODO. DIZER QUE NAO E ESTACAO COMPLETA.
        //
        // PROFUNDIDADE (FICHA): 12.349 / 5.960 / 5.419 / 1.885 / 980 / 862 / 834 / 569 / 531 / 198.
        // CORTE: Radio Control UK 6-in-1 (11), Weekeen-ish B0H27VKRQZ (21) — finos. AIR QUALITY MONITORS (Qingping/UbiBot) SAO OUTRA CATEGORIA.
        //
        // FOCUS KEYWORD: best weather station
        // VARIACOES TRABALHADAS: weather station / home weather station / wireless weather station /
        // wifi weather station / weather station with rain gauge / indoor outdoor thermometer /
        // personal weather station / weather station uk / weather station with wind
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'garden',                     // SLUG DA CATEGORIA (URL)
            'name' => 'Garden',                     // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best garden tools and outdoor equipment available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DE "garden")
        ];

        $article = [
            'slug' => 'best-weather-station',                                         // SLUG DO ARTIGO (URL) - FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Weather Station 2026: 10 Home Weather Stations Ranked',   // TITULO / H1
            'meta_title' => 'Best Weather Station 2026: Top 10 Home Stations Ranked',  // TITLE DA ABA/GOOGLE
            'meta_description' => 'The best weather station picks for UK homes, from simple thermometers to WiFi pro stations with wind and rain. Ten compared on sensors, app data and price.', // META DESCRIPTION
            'focus_keyword' => 'best weather station',                               // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE

            'intro' => "If you want the short answer, the Ambient Weather WS-2902 is the best weather station for most enthusiasts: 12,349 ratings at 4.4 stars, a full outdoor sensor for wind, rain, UV and solar, and WiFi that uploads your data to the web, for GBP 159.99. If you only want indoor and outdoor temperature and humidity, the Youshiko YC9441 does that with a UK radio-controlled clock for GBP 34.99.

The choice splits in two. A simple weather station shows indoor and outdoor temperature and humidity, a barometer and a forecast icon, and costs around thirty pounds. A multi-sensor station adds a garden array that measures wind speed, wind direction and rainfall, and starts around seventy. Worth knowing before you buy: the little sunny-or-rainy symbol on every console is a prediction from the barometric pressure trend over the next 12 to 24 hours, not a Met Office forecast, so treat it as a rough guide. The other divider is WiFi: some stations upload readings to an app and to weather networks, while cheaper ones only show the data on the console. We compared ten on sensors, connectivity and price, and ranked them below.",

            'conclusion' => "For a proper garden weather station the best pick here is the Ambient WS-2902: it measures everything, uploads to the web over WiFi, and has more reviews than any station on the page. If you want the same wind-and-rain data for less, the Bresser 5-in-1 is excellent value, and the Ecowitt is the one to choose if WiFi uploading matters most.

If you only care about temperature and humidity, do not pay for a multi-sensor station. The Youshiko and the cheaper consoles show indoor and outdoor readings with a UK radio clock for around thirty pounds, and the SensorPush is the pick if you want to log a single space like a greenhouse or fridge precisely from your phone. And remember the forecast icon is a pressure-based guess: for wind and rain you actually measure, you need one of the multi-sensor stations.",

            'author' => 'Felipe Iglesias',                                           // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-09-03 11:00:00',                                 // DATA FIXA — NAO USAR now()
        ];

        // ─── FICHA: good = MELHOR DA LISTA NO QUESITO, bad = PIOR, neutral = MEIO. COMPARA OS DEZ ENTRE SI. ───
        $products = [
            [
                'position' => 1,
                'name' => 'Ambient Weather WS-2902 WiFi Smart Weather Station, Wind, Rain, UV',
                'price' => '£159.99',
                'rating' => 4.4,
                'reviews_count' => 12349,
                'image' => 'https://m.media-amazon.com/images/I/51fSHzJV5dL._AC_SL1500_.jpg',
                'alt_text' => 'best weather station',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01N5TEHLI?tag=ranked10-21',
                'summary' => 'The best weather station for most enthusiasts. A full outdoor sensor for wind, rain, UV and solar, WiFi that uploads to the web, and 12,349 ratings at 4.4 stars.',
                'body' => "With 12,349 ratings at 4.4 stars, this has more customer feedback than any weather station on the page, and it earns it by measuring everything. The solar-powered Osprey outdoor sensor tracks temperature, humidity, wind speed and direction, rainfall and UV, and the colour console shows it all at a glance. For anyone who wants a real garden weather station rather than a thermometer, this is the standard the others are judged against.

Its WiFi is the other reason to buy it. The station transmits your readings to the Ambient Weather Network and to Weather Underground, so you can view your garden's conditions from your phone anywhere, set alerts and even trigger smart-home routines through IFTTT. That turns it from a display into a proper personal weather station that logs history.

At GBP 159.99 it is a mid-to-premium price, and like all these arrays the sensor needs mounting somewhere open and level to read wind and rain accurately. But for the combination of complete data, WiFi uploading and a huge, settled review base, nothing else here matches it.",
                'pros' => ['12,349 ratings at 4.4 stars, by far the most here', 'Full outdoor sensor: wind, rain, UV, temperature, humidity', 'WiFi uploads to Ambient and Weather Underground', 'App alerts and IFTTT smart-home routines', 'Solar-powered outdoor array'],
                'contras' => ['GBP 159.99, mid-to-premium price', 'Sensor needs careful open, level mounting for accuracy', 'More station than temperature-only buyers need', 'Forecast icon is still a pressure-trend guess'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '12,349 at 4.4 stars', 'verdict' => 'good', 'note' => 'By far the most feedback here.'],
                    ['label' => 'Sensors', 'value' => 'Wind, rain, UV, more', 'verdict' => 'good', 'note' => 'Measures everything.'],
                    ['label' => 'WiFi upload', 'value' => 'Yes, to networks', 'verdict' => 'good'],
                    ['label' => 'Power', 'value' => 'Solar outdoor sensor', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£159.99', 'verdict' => 'neutral'],
                    ['label' => 'Type', 'value' => 'Full pro station', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'BRESSER 5-in-1 Weather Station with Outdoor Sensor and Radio Clock',
                'price' => '£89.99',
                'rating' => 4.5,
                'reviews_count' => 5960,
                'image' => 'https://m.media-amazon.com/images/I/816JFNB-C2L._AC_SL1500_.jpg',
                'alt_text' => 'BRESSER 5-in-1 weather station with outdoor sensor',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0170A47DI?tag=ranked10-21',
                'summary' => 'The best value multi-sensor station. A 5-in-1 outdoor array with wind and rain, a radio-controlled clock and 5,960 ratings at 4.5 stars, for GBP 89.99.',
                'body' => "If you want wind and rainfall data but not a GBP 160 station, the Bresser is the pick. Its 5-in-1 outdoor sensor measures temperature, humidity, wind speed, wind direction and rainfall, and the console displays more than ten values at once. With 5,960 ratings at 4.5 stars, it is the best-reviewed multi-sensor station on the page after the Ambient, at a little over half the price.

It is a proper optical-and-mechanical station rather than a WiFi one, so you read the data on the wall-mounted console rather than an app, which suits people who just want the numbers in the kitchen. The clock is radio-controlled from the German DCF signal, which reaches the UK, and you can switch to manual time if you prefer.

Two things to note. It has no WiFi, so there is no uploading or remote viewing, and the DCF clock is set for the continental signal rather than the UK's own MSF, though it keeps time well either way. For accurate wind and rain readings at a sensible price, though, it is the value champion here.",
                'pros' => ['5,960 ratings at 4.5 stars, the best-reviewed value pro station', '5-in-1 sensor with wind, rain and direction for GBP 89.99', 'Console shows more than ten values at once', 'Radio-controlled clock with a manual fallback', 'Around half the price of the Ambient'],
                'contras' => ['No WiFi, so no app or remote viewing', 'Clock uses the German DCF signal, not UK MSF', 'Needs open mounting for accurate wind and rain', 'Amber backlight only'],
                'specs' => [
                    ['label' => 'Sensors', 'value' => '5-in-1, wind and rain', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '5,960 at 4.5 stars', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£89.99', 'verdict' => 'good', 'note' => 'Best value multi-sensor here.'],
                    ['label' => 'WiFi upload', 'value' => 'No', 'verdict' => 'bad'],
                    ['label' => 'Clock', 'value' => 'DCF radio (German)', 'verdict' => 'neutral'],
                    ['label' => 'Type', 'value' => 'Multi-sensor', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Youshiko YC9441 Weather Station, UK MSF Radio Clock, Indoor/Outdoor',
                'price' => '£34.99',
                'rating' => 4.3,
                'reviews_count' => 862,
                'image' => 'https://m.media-amazon.com/images/I/71zOLd03V5L._AC_SL1500_.jpg',
                'alt_text' => 'Youshiko YC9441 weather station with UK radio clock',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B088FZYKHT?tag=ranked10-21',
                'summary' => 'The best simple pick. A UK brand with a proper MSF radio clock, indoor and outdoor temperature, humidity and barometer, for GBP 34.99.',
                'body' => "If you do not need wind and rain, do not pay for it. The Youshiko YC9441 does the job most people actually want from a weather station: indoor and outdoor temperature and humidity, a barometer, a moon phase and date, all on a clear console, for GBP 34.99. It has 862 ratings at 4.3 stars.

Its advantage over the cheap marketplace consoles is that it is a UK company with UK warranty and support, and it uses the UK's own MSF radio signal to set the clock, so the time is always exact and changes itself for the spring and autumn clock changes. It supports up to three sensors for different rooms or the garden, with a 60-metre range, and comes with a UK power supply.

It is a simple station, so there is no WiFi and no wind or rain, and the forecast is the usual pressure-trend icon. But for a reliable, well-supported indoor-outdoor thermometer and barometer with a proper UK clock, it is the pick, and it costs a fraction of the multi-sensor stations.",
                'pros' => ['UK brand with UK warranty and support', 'MSF radio clock keeps exact UK time, auto DST', 'Indoor and outdoor temperature, humidity and barometer', 'Supports up to three sensors, 60m range', 'GBP 34.99 with a UK power supply included'],
                'contras' => ['No wind or rain measurement', 'No WiFi or app', 'Forecast is a pressure-trend icon', 'Basic mono console rather than colour'],
                'specs' => [
                    ['label' => 'Type', 'value' => 'Simple, temp/humidity', 'verdict' => 'neutral', 'note' => 'No wind or rain.'],
                    ['label' => 'Clock', 'value' => 'UK MSF radio', 'verdict' => 'good', 'note' => 'Exact UK time, auto DST.'],
                    ['label' => 'Price', 'value' => '£34.99', 'verdict' => 'good'],
                    ['label' => 'Brand', 'value' => 'UK, with warranty', 'verdict' => 'good'],
                    ['label' => 'Sensors', 'value' => 'Up to 3, 60m', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '862 at 4.3 stars', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Ecowitt WS2910 7-in-1 WiFi Weather Station, Solar Sensor, Colour Display',
                'price' => '£134.99',
                'rating' => 4.5,
                'reviews_count' => 834,
                'image' => 'https://m.media-amazon.com/images/I/61bZVq7S-2L._AC_SL1500_.jpg',
                'alt_text' => 'Ecowitt WS2910 7-in-1 WiFi weather station',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0991GVBYK?tag=ranked10-21',
                'summary' => 'The pick if WiFi uploading matters most. A 7-in-1 solar sensor and a colour console that sends data to the web, at 4.5 stars.',
                'body' => "The Ecowitt WS2910 is the enthusiast's value WiFi station. Its 7-in-1 solar-powered outdoor sensor measures temperature, humidity, rainfall, wind speed and direction, UV and solar radiation, and the colour LCD console uploads it all over WiFi to services like Weather Underground and Ecowitt's own platform, where you can log and graph your history. It has 834 ratings at 4.5 stars.

Compared with the Ambient WS-2902, it costs less at GBP 134.99 and has the higher star rating, though on a smaller sample. Its console and app are a favourite of hobbyists because Ecowitt sells a wide range of add-on sensors, so you can expand into soil moisture, extra thermometers or air quality later.

It sits just below the Ambient mainly on review count and brand familiarity rather than capability. If uploading your data and being able to grow the system matter to you, it is arguably the better buy of the two WiFi stations.",
                'pros' => ['7-in-1 solar sensor: wind, rain, UV, solar and more', 'WiFi uploads to Weather Underground and Ecowitt', 'Colour console, 4.5 star rating', 'Cheaper than the Ambient WS-2902', 'Expandable with add-on sensors'],
                'contras' => ['834 ratings, fewer than the Ambient or Bresser', 'Less familiar brand to UK buyers', 'Needs careful outdoor mounting', 'App setup takes a little patience'],
                'specs' => [
                    ['label' => 'Sensors', 'value' => '7-in-1 solar', 'verdict' => 'good'],
                    ['label' => 'WiFi upload', 'value' => 'Yes, expandable', 'verdict' => 'good', 'note' => 'Add-on sensors available.'],
                    ['label' => 'Average score', 'value' => '4.5 stars', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£134.99', 'verdict' => 'neutral', 'note' => 'Cheaper than the WS-2902.'],
                    ['label' => 'Customer ratings', 'value' => '834', 'verdict' => 'neutral'],
                    ['label' => 'Type', 'value' => 'Full pro station', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Tempest Weather Station, AI Forecasting, No Moving Parts, WiFi',
                'price' => '£349.00',
                'rating' => 4.2,
                'reviews_count' => 1885,
                'image' => 'https://m.media-amazon.com/images/I/618WaTRyhBL._AC_SL1500_.jpg',
                'alt_text' => 'Tempest weather station with no moving parts',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0868WY7NY?tag=ranked10-21',
                'summary' => 'The premium pick. A single solar sensor with no moving parts to wear out, AI forecasting and full app and Alexa support — at the highest price here.',
                'body' => "The Tempest is the high-end choice, and its defining feature is that it has no moving parts. Instead of a spinning cup anemometer and a tipping rain bucket, it measures wind sonically and rain by haptic sensor, so there is nothing to jam, wear out or clog with leaves over the years. It is solar-powered, sends everything to an app with AI-assisted forecasting, and works with Alexa. With 1,885 ratings at 4.2 stars and over 85,000 users, it is a proven system.

For a set-and-forget station that should keep working for years with no maintenance, that sealed design is a real advantage over the mechanical arrays above.

Two honest caveats. At GBP 349 it is more than twice the price of the Ambient and by far the most expensive here. And the trade for having no moving parts is that haptic rain sensing is generally less precise than a traditional tipping bucket in heavy downpours, which enthusiasts who want exact rainfall totals should weigh. For low-maintenance, app-first weather monitoring, though, it is the most advanced station on the page.",
                'pros' => ['No moving parts, nothing to jam or wear out', 'Solar-powered, low maintenance for years', 'AI-assisted forecasting, app and Alexa', '1,885 ratings and over 85,000 users', 'Single tidy sensor, easy to site'],
                'contras' => ['GBP 349, by far the most expensive here', 'Haptic rain sensing is less precise than a tipping bucket in heavy rain', '4.2 stars, mid-pack rating', 'Overkill for casual users'],
                'specs' => [
                    ['label' => 'Design', 'value' => 'No moving parts', 'verdict' => 'good', 'note' => 'Nothing to jam or wear out.'],
                    ['label' => 'Price', 'value' => '£349.00', 'verdict' => 'bad', 'note' => 'The most expensive here.'],
                    ['label' => 'Forecast', 'value' => 'AI, app-based', 'verdict' => 'good'],
                    ['label' => 'Rain accuracy', 'value' => 'Haptic, less exact', 'verdict' => 'neutral', 'note' => 'Weaker than a tipping bucket in downpours.'],
                    ['label' => 'Customer ratings', 'value' => '1,885 at 4.2 stars', 'verdict' => 'neutral'],
                    ['label' => 'WiFi upload', 'value' => 'Yes', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'SensorPush HT1 Smart Temperature and Humidity Sensor, App Monitoring',
                'price' => '£53.99',
                'rating' => 4.5,
                'reviews_count' => 5419,
                'image' => 'https://m.media-amazon.com/images/I/61UpdfJkpxL._AC_SL1500_.jpg',
                'alt_text' => 'SensorPush HT1 smart temperature and humidity sensor',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01AEQ9X9I?tag=ranked10-21',
                'summary' => 'Not a full weather station, but the best way to log one space precisely. A phone-monitored temperature and humidity sensor for a greenhouse, fridge or humidor, at 4.5 stars.',
                'body' => "The SensorPush is a different tool from the rest of this list, and it is here because so many people search for a weather station when what they actually need is to monitor one specific space. It is a small, accurate sensor with no display: it records temperature, humidity, heat index and dew point 24/7 and sends the data to your phone, where you see live readings and graphs and set alerts. It has 5,419 ratings at 4.5 stars.

That makes it ideal for a greenhouse, a wine store, a humidor, a reptile tank, a fridge or a damp room, where you want precise, logged data for one place rather than a picture of the outdoor weather. Setup is genuinely simple, the battery lasts one to two years, and the hardware is accurate.

Be clear on what it is not: with no wind, no rain, no barometer and no console, it is not a weather station in the traditional sense. But if precise monitoring of a single environment from your phone is your real goal, it does that better and more reliably than any console here.",
                'pros' => ['Precise, logged temperature and humidity for one space', 'App shows live data, graphs and alerts, 24/7', '5,419 ratings at 4.5 stars', 'One to two year battery, simple setup', 'Ideal for a greenhouse, fridge, humidor or damp room'],
                'contras' => ['Not a weather station: no wind, rain, barometer or display', 'Phone-only, no console to glance at', 'Bluetooth range is limited without the add-on gateway', 'One sensor per unit'],
                'specs' => [
                    ['label' => 'Type', 'value' => 'Single-space sensor', 'verdict' => 'neutral', 'note' => 'Not a full weather station.'],
                    ['label' => 'Customer ratings', 'value' => '5,419 at 4.5 stars', 'verdict' => 'good'],
                    ['label' => 'Logging', 'value' => '24/7 to app', 'verdict' => 'good', 'note' => 'Graphs and alerts.'],
                    ['label' => 'Battery', 'value' => '1 to 2 years', 'verdict' => 'good'],
                    ['label' => 'Display', 'value' => 'None, phone only', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£53.99', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Weather Station Indoor Outdoor with Colour Display, MSF Clock, Barometer',
                'price' => '£30.59',
                'rating' => 4.4,
                'reviews_count' => 980,
                'image' => 'https://m.media-amazon.com/images/I/61pdvIzuWSL._AC_SL1500_.jpg',
                'alt_text' => 'Colour display indoor outdoor weather station with MSF clock',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FW3SMPKW?tag=ranked10-21',
                'summary' => 'The cheapest here at GBP 30.59, and well-reviewed. A colour-display indoor-outdoor console with a UK MSF radio clock and dew and heat-index readings.',
                'body' => "This is the cheapest station on the page at GBP 30.59, and with 980 ratings at 4.4 stars it is a well-liked simple console. It shows indoor and outdoor temperature and humidity on a large colour display, adds dew point and a heat index so you know how conditions actually feel, and sets its clock from the UK MSF radio signal for exact, self-adjusting time.

It runs on mains power with a battery backup and lets you adjust the backlight brightness, which is handy if it sits in a bedroom. It supports up to three sensors over a 100-metre range for monitoring different rooms.

Like the Youshiko, it is a temperature-and-humidity station rather than a multi-sensor one, so there is no wind, rain or WiFi, and the forecast is a pressure-trend icon. But for the lowest price here with a colour screen and a proper UK clock, it is a lot of simple station for the money.",
                'pros' => ['Cheapest here at GBP 30.59, 980 ratings at 4.4 stars', 'Large colour display with dew and heat index', 'UK MSF radio clock, exact self-setting time', 'Mains power with battery backup, adjustable backlight', 'Up to three sensors, 100m range'],
                'contras' => ['No wind, rain or WiFi', 'Marketplace brand rather than an established name', 'Forecast is a pressure-trend icon', 'Colour screen is basic'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£30.59', 'verdict' => 'good', 'note' => 'The cheapest here.'],
                    ['label' => 'Display', 'value' => 'Large colour', 'verdict' => 'good'],
                    ['label' => 'Clock', 'value' => 'UK MSF radio', 'verdict' => 'good'],
                    ['label' => 'Type', 'value' => 'Simple, temp/humidity', 'verdict' => 'neutral'],
                    ['label' => 'Customer ratings', 'value' => '980 at 4.4 stars', 'verdict' => 'neutral'],
                    ['label' => 'Sensors', 'value' => 'Up to 3, 100m', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'LIORQUE Weather Station with 7.5in Display, Outdoor Sensor, Radio Clock',
                'price' => '£36.99',
                'rating' => 4.5,
                'reviews_count' => 569,
                'image' => 'https://m.media-amazon.com/images/I/71lfCYUw8pL._AC_SL1500_.jpg',
                'alt_text' => 'LIORQUE weather station with large 7.5 inch display',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FJ5Z89GK?tag=ranked10-21',
                'summary' => 'A simple station with an unusually large 7.5-inch screen, at 4.5 stars for GBP 36.99. Easy to read across a room.',
                'body' => "The LIORQUE's selling point is its screen. At 7.5 inches its VA display is large and clear enough to read across a kitchen, which matters more than it sounds if you glance at the weather from the far side of the room. It shows indoor and outdoor temperature and humidity, a barometer and a seven-icon forecast, with a radio-controlled clock that adjusts itself for the clock changes. It has 569 ratings at 4.5 stars.

It runs on mains power with brightness levels you can dial down, or on batteries, and supports up to three outdoor sensors, though only one is included.

Like the other simple consoles it does not measure wind or rain and has no WiFi. But among the cheap temperature-and-humidity stations, its big, legible display and 4.5-star rating make it a strong pick if reading it easily is what you care about most.",
                'pros' => ['Large 7.5-inch display, easy to read across a room', '4.5 stars over 569 ratings for GBP 36.99', 'Indoor and outdoor temperature, humidity and barometer', 'Radio-controlled clock with auto clock changes', 'Mains or battery power, adjustable brightness'],
                'contras' => ['No wind, rain or WiFi', 'Only one outdoor sensor included', 'Forecast is a pressure-trend icon', 'Smaller brand'],
                'specs' => [
                    ['label' => 'Display', 'value' => '7.5in, large', 'verdict' => 'good', 'note' => 'Easy to read across a room.'],
                    ['label' => 'Average score', 'value' => '4.5 stars', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£36.99', 'verdict' => 'good'],
                    ['label' => 'Type', 'value' => 'Simple, temp/humidity', 'verdict' => 'neutral'],
                    ['label' => 'Clock', 'value' => 'Radio controlled', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '569', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'Ambient Weather WS-1965 WiFi Weather Station, All-in-One Sensor',
                'price' => '£119.99',
                'rating' => 4.2,
                'reviews_count' => 531,
                'image' => 'https://m.media-amazon.com/images/I/51IFDZYAHEL._AC_SL1500_.jpg',
                'alt_text' => 'Ambient Weather WS-1965 WiFi weather station',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BBH688XG?tag=ranked10-21',
                'summary' => 'A cheaper WiFi Ambient station. The same all-in-one sensor and network uploading as the WS-2902, for GBP 40 less.',
                'body' => "The WS-1965 is Ambient's more affordable WiFi station. It uses an all-in-one outdoor sensor that measures temperature, humidity, barometric pressure, wind speed, wind direction and rainfall, and, like the WS-2902, it uploads to the Ambient Weather Network and Weather Underground so you can view and log your data remotely and trigger IFTTT routines. It has 531 ratings at 4.2 stars, for GBP 119.99.

The main differences from the WS-2902 above are a simpler console and no UV or solar measurement, in exchange for a lower price. For most people who mainly want wind, rain, temperature and humidity uploaded to an app, that is a sensible saving.

It ranks below the WS-2902 on both rating and review count, and its 4.2 average is a touch lower. But if you want Ambient's WiFi ecosystem and the core weather measurements for forty pounds less, this is the way to get them.",
                'pros' => ['All-in-one sensor: wind, rain, temperature, humidity, pressure', 'WiFi uploads to Ambient and Weather Underground', 'IFTTT smart-home routines', 'GBP 40 cheaper than the WS-2902', 'Ambient ecosystem and app'],
                'contras' => ['No UV or solar measurement', 'Simpler console than the WS-2902', '4.2 stars over 531 ratings, below the WS-2902', 'Needs open mounting for accuracy'],
                'specs' => [
                    ['label' => 'Sensors', 'value' => 'Wind, rain, pressure', 'verdict' => 'good', 'note' => 'No UV or solar.'],
                    ['label' => 'WiFi upload', 'value' => 'Yes, to networks', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£119.99', 'verdict' => 'neutral', 'note' => 'Cheaper than the WS-2902.'],
                    ['label' => 'Customer ratings', 'value' => '531 at 4.2 stars', 'verdict' => 'neutral'],
                    ['label' => 'Type', 'value' => 'Full pro station', 'verdict' => 'good'],
                    ['label' => 'Console', 'value' => 'Simpler', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'VEVOR 7-in-1 Wireless Weather Station, 7.5in Colour Display (No WiFi)',
                'price' => '£70.90',
                'rating' => 4.3,
                'reviews_count' => 198,
                'image' => 'https://m.media-amazon.com/images/I/61Akksdm2-L._AC_SL1500_.jpg',
                'alt_text' => 'VEVOR 7-in-1 wireless weather station with colour display',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CRQTRWGZ?tag=ranked10-21',
                'summary' => 'The cheapest way into wind and rain data, at GBP 70.90. A 7-in-1 solar sensor and a big colour screen — but no WiFi, so the data stays on the console.',
                'body' => "The VEVOR is the least expensive multi-sensor station here. Its solar-powered 7-in-1 outdoor sensor measures wind speed and direction, temperature, humidity, rainfall and UV, and it shows everything on a large 7.5-inch colour display, with a long 150-metre transmission range. At GBP 70.90 it undercuts the Bresser for getting wind and rain onto your console.

For someone who wants the full set of garden measurements at the lowest price and is happy to read them on the wall, it does the job, and the big screen is easy to take in at a glance.

Its two limits explain the ranking. It is explicitly a no-WiFi station, so there is no app, no remote viewing and no uploading to weather networks, which the Ambient and Ecowitt offer. And with 198 ratings it has a much smaller review base than the established stations above. If you want cheap wind-and-rain data on a console and nothing more, it is a fair buy; if you want to log or share your data, pay more for a WiFi station.",
                'pros' => ['Cheapest 7-in-1 multi-sensor station here', 'Wind, rain, UV, temperature and humidity for GBP 70.90', 'Large 7.5-inch colour display', 'Solar sensor with a 150m range', 'Full garden data at a low price'],
                'contras' => ['No WiFi, so no app, remote viewing or uploading', 'Only 198 ratings, a small sample', 'Less established brand', 'Console-only, no data logging'],
                'specs' => [
                    ['label' => 'Sensors', 'value' => '7-in-1 solar', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£70.90', 'verdict' => 'good', 'note' => 'Cheapest multi-sensor here.'],
                    ['label' => 'WiFi upload', 'value' => 'No', 'verdict' => 'bad', 'note' => 'Console only, no app.'],
                    ['label' => 'Display', 'value' => '7.5in colour', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '198 at 4.3 stars', 'verdict' => 'bad', 'note' => 'Small sample.'],
                    ['label' => 'Range', 'value' => '150 m', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
        ];

        // ═══════════════════════════════════════════════════════════════
        // ═══ FIM DA AREA EDITAVEL ═══
        // ═══════════════════════════════════════════════════════════════

        $categoryModel = Category::updateOrCreate(['slug' => $category['slug']], $category); // CRIA/ATUALIZA A CATEGORIA
        $articleModel = Article::updateOrCreate(['slug' => $article['slug']], array_merge($article, ['category_id' => $categoryModel->id])); // CRIA/ATUALIZA O ARTIGO
        $articleModel->products()->delete(); // REMOVE PRODUTOS ANTIGOS DESTE ARTIGO
        foreach ($products as $produto) { // PERCORRE A LISTA MANUAL
            $articleModel->products()->create($produto); // RECRIA CADA PRODUTO VINCULADO AO ARTIGO
        }
        $this->command?->info("WeatherStationsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
