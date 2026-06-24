@props(['author']){{-- PROP: ARRAY DE PERFIL DO AUTOR (DE config/authors.php) OU NULL --}}

@if ($author){{-- SO RENDERIZA O BLOCO SE O ARTIGO TIVER UM PERFIL DE AUTOR CONHECIDO --}}
    @php
        // VERIFICA SE O ARQUIVO DE FOTO REALMENTE EXISTE EM public/ PARA DECIDIR FOTO x INICIAIS
        $temFoto = ! empty($author['photo']) && file_exists(public_path($author['photo'])); // TRUE SE A FOTO EXISTE
        $iniciais = collect(explode(' ', $author['name']))->take(2)->map(fn ($p) => mb_substr($p, 0, 1))->implode(''); // GERA AS INICIAIS DO NOME
        $sociais = array_filter($author['socials'] ?? []); // REMOVE OS LINKS SOCIAIS VAZIOS
    @endphp

    <section class="mt-12 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8" aria-label="About the author">{{-- BLOCO DA BIO DO AUTOR --}}
        <div class="flex flex-col gap-5 sm:flex-row sm:items-start">{{-- LAYOUT: FOTO + TEXTO (EMPILHA NO MOBILE) --}}

            <div class="shrink-0">{{-- COLUNA DA FOTO/AVATAR --}}
                @if ($temFoto){{-- MOSTRA A FOTO REAL SE O ARQUIVO EXISTIR --}}
                    <img src="{{ asset($author['photo']) }}" alt="Photo of {{ $author['name'] }}" loading="lazy" class="h-24 w-24 rounded-full border-2 border-brand object-cover sm:h-28 sm:w-28">{{-- FOTO DO AUTOR --}}
                @else{{-- CASO CONTRARIO, MOSTRA UM AVATAR COM AS INICIAIS --}}
                    <div class="flex h-24 w-24 items-center justify-center rounded-full bg-ink text-2xl font-extrabold text-white sm:h-28 sm:w-28" role="img" aria-label="Photo of {{ $author['name'] }}">{{ $iniciais }}</div>{{-- AVATAR COM INICIAIS --}}
                @endif
            </div>

            <div>{{-- COLUNA DO TEXTO --}}
                <p class="text-xs font-semibold uppercase tracking-wide text-brand">Written by</p>{{-- ROTULO --}}
                <h2 class="mt-1 text-xl font-bold text-slate-900">{{ $author['name'] }}</h2>{{-- NOME DO AUTOR --}}
                @if (! empty($author['role'])){{-- SO MOSTRA O CARGO SE EXISTIR --}}
                    <p class="text-sm font-medium text-slate-500">{{ $author['role'] }}</p>{{-- CARGO/FUNCAO --}}
                @endif
                <p class="mt-3 leading-relaxed text-slate-600">{{ $author['bio'] }}</p>{{-- TEXTO DA BIO --}}

                @if (! empty($sociais)){{-- SO MOSTRA OS LINKS SOCIAIS SE HOUVER ALGUM --}}
                    <div class="mt-4 flex items-center gap-3">{{-- LINHA DE ICONES SOCIAIS --}}
                        @if (! empty($sociais['website']))
                            <a href="{{ $sociais['website'] }}" target="_blank" rel="noopener" class="text-slate-400 hover:text-brand" aria-label="{{ $author['name'] }} website">
                                {{-- ICONE GLOBO (BOOTSTRAP ICONS: GLOBE) EM SVG INLINE --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287zM4.249 3.539q.214-.577.481-1.078a7 7 0 0 1 .597-.933A7 7 0 0 0 3.051 3.05q.544.277 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9 9 0 0 1-1.565-.667A6.96 6.96 0 0 0 1.018 7.5zm1.4-2.741a12.3 12.3 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.3 12.3 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.6 13.6 0 0 1 7.5 10.91V8.5zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741zm-3.282 3.696q.118.312.395.872c.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a7 7 0 0 1-.598-.933 9 9 0 0 1-.481-1.079 8.4 8.4 0 0 0-1.198.49 7 7 0 0 0 2.276 1.522zm-1.383-2.964A13.4 13.4 0 0 1 3.508 8.5h-2.49a6.96 6.96 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7 7 0 0 0 2.275-1.521 8.4 8.4 0 0 0-1.197-.49 9 9 0 0 1-.481 1.078 7 7 0 0 1-.597.933M8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855q.276-.519.395-.872A12.6 12.6 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.96 6.96 0 0 0 14.982 8.5h-2.49a13.4 13.4 0 0 1-.437 3.008M14.982 7.5a6.96 6.96 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008zM11.27 2.461q.266.502.482 1.078a8.4 8.4 0 0 0 1.196-.49 7 7 0 0 0-2.275-1.52c.218.283.418.597.597.932m-.488 1.343a8 8 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"/></svg>
                            </a>{{-- LINK DO SITE --}}
                        @endif
                        @if (! empty($sociais['twitter']))
                            <a href="{{ $sociais['twitter'] }}" target="_blank" rel="noopener" class="text-slate-400 hover:text-brand" aria-label="{{ $author['name'] }} on X">
                                {{-- ICONE X/TWITTER (BOOTSTRAP ICONS: TWITTER-X) EM SVG INLINE --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/></svg>
                            </a>{{-- LINK DO X --}}
                        @endif
                        @if (! empty($sociais['instagram']))
                            <a href="{{ $sociais['instagram'] }}" target="_blank" rel="noopener" class="text-slate-400 hover:text-brand" aria-label="{{ $author['name'] }} on Instagram">
                                {{-- ICONE INSTAGRAM (BOOTSTRAP ICONS: INSTAGRAM) EM SVG INLINE --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/></svg>
                            </a>{{-- LINK DO INSTAGRAM --}}
                        @endif
                        @if (! empty($sociais['linkedin']))
                            <a href="{{ $sociais['linkedin'] }}" target="_blank" rel="noopener" class="text-slate-400 hover:text-brand" aria-label="{{ $author['name'] }} on LinkedIn">
                                {{-- ICONE LINKEDIN (BOOTSTRAP ICONS: LINKEDIN) EM SVG INLINE --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/></svg>
                            </a>{{-- LINK DO LINKEDIN --}}
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
