<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="bg-white">
    <!-- Header -->
    <header class="absolute inset-x-0 top-0 z-50" id="inicio">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                @if($config->logo)
                    <a href="#inicio" class="-m-1.5 p-1.5">
                        <span class="sr-only">Logo</span>
                        <img class="h-8 w-auto" src="{{url('storage').'/'.$config->logo}}" alt="">
                    </a>
                @endif
            </div>
            <div class="flex lg:hidden">
                <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="#inicio" class="text-sm font-semibold leading-6 text-gray-900">Inicio</a>
                <a href="#sobre" class="text-sm font-semibold leading-6 text-gray-900">Sobre nós</a>
                <a href="#servicos" class="text-sm font-semibold leading-6 text-gray-900">Serviços</a>
                <a href="#orcamento" class="text-sm font-semibold leading-6 text-gray-900">Orçamento</a>
            </div>
            {{--            <div class="hidden lg:flex lg:flex-1 lg:justify-end">--}}
            {{--                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>--}}
            {{--            </div>--}}
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div class="lg:hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-50"></div>
            <div
                class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    @if($config->logo)
                        <a href="#inicio" class="-m-1.5 p-1.5">
                            <span class="sr-only">Logo</span>
                            <img class="h-8 w-auto" src="{{url('storage').'/'.$config->logo}}" alt="">
                        </a>
                    @endif
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="#"
                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Inicio</a>
                            <a href="#"
                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Sobre
                                nós</a>
                            <a href="#"
                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Serviços</a>
                            <a href="#"
                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Orçamento</a>
                        </div>
                        {{--                        <div class="py-6">--}}
                        {{--                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="isolate">
        <!-- Hero section -->
        <div class="relative pt-14">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                 aria-hidden="true">
                <div
                    class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="py-24 sm:py-32">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl text-center">
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">{{$formulario->nome}}</h1>
                        <p class="mt-6 text-lg leading-8 text-gray-600">{!! $formulario->descricao !!}</p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <a href="#orcamento"
                               class="rounded-md bg-[{{$config->cor_primaria}}] px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[{{$config->cor_primaria}}] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[{{$config->cor_primaria}}]">Fazer
                                orçamento</a>
                            <a href="#sobre" class="text-sm font-semibold leading-6 text-gray-900">conhecer mais <span
                                    aria-hidden="true">→</span></a>
                        </div>
                    </div>
                    {{--                    <div class="mt-16 flow-root sm:mt-24">--}}
                    {{--                        <div class="-m-2 rounded-xl bg-gray-900/5 p-2 ring-1 ring-inset ring-gray-900/10 lg:-m-4 lg:rounded-2xl lg:p-4">--}}
                    {{--                            <img src="https://tailwindui.com/img/component-images/project-app-screenshot.png" alt="App screenshot" width="2432" height="1442" class="rounded-md shadow-2xl ring-1 ring-gray-900/10">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
            <div
                class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div
                    class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
        </div>


        {{--        Sobre nós--}}

        <div class="mx-auto mt-10 max-w-7xl sm:mt-10 sm:px-6 lg:px-8" id="sobre">
            <div
                class="relative overflow-hidden bg-gray-900 px-6 py-20 shadow-xl sm:rounded-3xl sm:px-10 sm:py-24 md:px-12 lg:px-20">
                <img class="absolute inset-0 h-full w-full object-cover brightness-150 saturate-0"
                     src="{{url('img/bg-sobre.jpg')}}" alt="">
                <div class="absolute inset-0 bg-[{{$config->cor_secundaria}}] mix-blend-multiply"></div>
                <div class="absolute -left-80 -top-56 transform-gpu blur-3xl" aria-hidden="true">
                    <div
                        class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-r from-[#ff4694] to-[#776fff] opacity-[0.45]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                </div>
                <div class="hidden md:absolute md:bottom-16 md:left-[50rem] md:block md:transform-gpu md:blur-3xl"
                     aria-hidden="true">
                    <div
                        class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-r from-[#ff4694] to-[#776fff] opacity-25"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                </div>
                <div class="relative mx-auto max-w-2xl lg:mx-0">
                    <figure>
                        <blockquote class="mt-6 text-lg font-semibold text-white sm:text-xl sm:leading-8">
                            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-200 sm:text-4xl mb-4">Quem
                                somos </p>

                            <p>
                                {!! $config->descricao !!}
                            </p>
                        </blockquote>

                    </figure>
                </div>
            </div>
        </div>


        <!-- Logo cloud -->
        <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-8">
            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-8 text-center">Quem
                Confia </p>

            <div
                class="mx-auto grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-12 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 sm:gap-y-14 lg:mx-0 lg:max-w-none lg:grid-cols-5">

                @if($config->logos_clientes)
                    @foreach($config->logos_clientes as $item)
                        <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                             src="{{url('storage').'/'.$item}}" alt="Transistor" width="158" style="max-height: 50px">
                    @endforeach

                @endif

            </div>

        </div>


        <!-- Feature section -->
        <div class="mx-auto mt-32 max-w-7xl px-6 sm:mt-56 lg:px-8" id="servicos">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-[{{$config->cor_primaria}}]">{{$formulario->nome}}</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Entregáveis </p>
                <p class="mt-6 text-lg leading-8 text-gray-600">Conheça os itens que podemos entregar para este
                    serviço</p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                    @forelse($formulario->entregavel as $item)

                        <div class="relative pl-16">
                            <dt class="text-base font-semibold leading-7 text-gray-900">
                                @if($item->icone)
                                    <div class="absolute left-0 top-2 flex h-12 w-12 items-center justify-center ">
                                        <img src="{{url('storage').'/'.$item->icone}}">
                                    </div>
                            @endif
                            {{$item->nome}}
                            <dt>
                            <dd class="mt-2 text-base leading-7 text-gray-600">
                                {!! $item->descricao !!}
                            </dd>
                        </div>
                    @empty

                    @endforelse

                </dl>
            </div>
        </div>
        <!-- Form section -->
        <div class="relative -z-10 mt-32 px-6 lg:px-8" id="orcamento">
            <div
                class="absolute inset-x-0 top-1/2 -z-10 flex -translate-y-1/2 transform-gpu justify-center overflow-hidden blur-3xl sm:bottom-0 sm:right-[calc(50%-6rem)] sm:top-auto sm:translate-y-0 sm:transform-gpu sm:justify-end"
                aria-hidden="true">
                <div
                    class="aspect-[1108/632] w-[69.25rem] flex-none bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-25"
                    style="clip-path: polygon(73.6% 48.6%, 91.7% 88.5%, 100% 53.9%, 97.4% 18.1%, 92.5% 15.4%, 75.7% 36.3%, 55.3% 52.8%, 46.5% 50.9%, 45% 37.4%, 50.3% 13.1%, 21.3% 36.2%, 0.1% 0.1%, 5.4% 49.1%, 21.4% 36.4%, 58.9% 100%, 73.6% 48.6%)"></div>
            </div>
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Orçamento</h2>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600">Preencha o formulário abaixo com seus
                    dados para solicitar o seu orçamento</p>
            </div>
            <livewire:landinpages.formulario form_id="{{$formulario->id}}" cor="{{$config->cor_primaria}}" />
        </div>
    </main>

    <!-- Footer -->
    <div class="mx-auto mt-32 max-w-7xl px-6 lg:px-8">
        <footer aria-labelledby="footer-heading" class="relative border-t border-gray-900/10 py-24 sm:mt-56 sm:py-32">
            <h2 id="footer-heading" class="sr-only">Rodapé</h2>
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div>
                    @if($config->logo)
                        <a href="#inicio" class="-m-1.5 p-1.5 transform transition-all duration-300 hover:scale-110">
                            <span class="sr-only">Logo</span>
                            <img class="h-8 w-auto" src="{{url('storage').'/'.$config->logo}}" alt="">
                        </a>
                    @endif
                    @if($config->endereco)
                        <div class="flex py-4">
                            <i class="bi bi-geo-alt-fill text-[{{$config->cor_primaria}}] transform transition-all duration-300 hover:scale-110"></i>
                            <p class="text-sm leading-6 text-gray-600 hover:text-gray-900 pl-2">{{$config->endereco}}</p>
                        </div>
                    @endif
                </div>

                <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                    <div>
                        <h3 class="text-sm font-semibold leading-6 text-gray-900">Contatos</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            @if($config->telefone)
                                <li>
                                    <a class="text-sm leading-6 text-gray-600 hover:text-gray-900 flex">
                                        <i class="bi bi-telephone-fill text-[{{$config->cor_primaria}}] transform transition-all duration-300 hover:scale-110"></i>
                                        <p class="pl-2"> {{$config->telefone}}</p>
                                    </a>
                                </li>
                            @endif
                            @if($config->email)
                                <li>
                                    <a class="text-sm leading-6 text-gray-600 hover:text-gray-900 flex">
                                        <i class="bi bi-envelope-fill text-[{{$config->cor_primaria}}] transform transition-all duration-300 hover:scale-110"></i>
                                        <p class="pl-2">{{$config->email}}</p>
                                    </a>
                                </li>
                            @endif
                            @if($config->whatsapp)
                                <li>
                                    <a href="{{$config->whatsapp}}"
                                       class="text-base	leading-6 text-white bg-[#25D366] transform transition-all duration-300 hover:scale-110
                                       inline-block no-underline font-[bold] bg-[#77CD51] px-5 py-2.5 rounded-[5px] hover:bg-[#86D365] hover:scale-105">
                                        Chamar no Whatsapp</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="mt-10 md:mt-0">
                        <h3 class="text-sm font-semibold leading-6 text-gray-900">Siga-nos</h3>
                        <div class="mt-6 space-y-4">
                            @if($config->instagram)
                                <a href="{{$config->instagram}}" target="_blank"
                                   class="text-sm leading-6 text-gray-600 hover:text-gray-900">
                                    <i class="bi bi-instagram text-[{{$config->cor_primaria}}] transform transition-all duration-300 hover:scale-110"></i>
                                </a>
                            @endif
                            @if($config->facebook)
                                <a href="{{$config->facebook}}" target="_blank"
                                   class="text-sm leading-6 text-gray-600 hover:text-gray-900 pl-3">
                                    <i class="bi bi-facebook text-[{{$config->cor_primaria}}] transform transition-all duration-300 hover:scale-110"></i>
                                </a>
                            @endif
                            @if($config->site)
                                <a href="{{$config->site}}" target="_blank"
                                   class="text-sm leading-6 text-gray-600 hover:text-gray-900 pl-3">
                                    <i class="bi bi-globe text-[{{$config->cor_primaria}}] transform transition-all duration-300 hover:scale-110"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </footer>
    </div>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</div>

