<div>
    <div class="relative isolate overflow-hidden bg-gray-900 px-6 py-24 sm:py-32 lg:px-8">
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=.8&w=2830&h=1500&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
        <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl" aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu" aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[{{$config->cor_primaria}}] to-[{{$config->cor_secundaria}}] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl text-center">
            @if($config->logo)
                <img src="{{url('storage/'.$config->logo)}}" class="mx-auto w-[200px] mb-4">
            @endif
            <h2 class="text-4xl font-bold tracking-tight text-white sm:text-4xl">{{$config->nome}}</h2>
            <div class="mt-6 text-lg leading-8 text-gray-200">{!! $config->descricao !!}</div>
        </div>
    </div>

    <div class="mx-auto my-12 max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
        <div class="mx-auto max-w-3xl">
            <h2 class="text-4xl font-bold tracking-tight text-[{{$config->cor_primaria}}] sm:text-6xl">Nossos Serviços</h2>

            <ul role="list" class="divide-y divide-gray-100">
                @if($formularios)
                    @foreach($formularios as $item)
                <li class="flex items-center justify-between gap-x-6 py-5">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{$item->nome}}</p>
                        </div>
                        <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                            <span>{!! $item->descricao !!}</span>

                        </div>
                    </div>
                    <div class="flex flex-none items-center gap-x-4">
                        <a href="{{route('site.landinpage',$item->id )}}" class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">Solicitar Orçamento</a>
                    </div>
                </li>
                    @endforeach
                @endif

            </ul>

        </div>
    </div>

    <!-- Logo cloud -->
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-8  bg-gray-100 py-8 rounded-lg">
        <p class="text-3xl font-bold tracking-tight text-[{{$config->cor_primaria}}] sm:text-4xl mb-12 text-center">Quem
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

    <!-- Footer -->
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <footer aria-labelledby="footer-heading" class="relative py-12">
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



</div>
