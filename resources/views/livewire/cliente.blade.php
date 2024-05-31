<div>
    <!-- Header -->
    <header>
        <img class="w-full" src="{{url('storage').'/'.$config->banner}}" alt="">
        <div class="py-24 sm:py-8">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-6xl">{{$config->frase_1}}</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">{!! $config->frase_2 !!}</p>

                </div>

            </div>
        </div>
    </header>
    <div class="mx-auto my-12 max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
        <div class="mx-auto max-w-4xl">
            <h2 class="text-4xl text-center font-bold tracking-tight text-[{{$config->cor_primaria}}] sm:text-4xl">Conheça nossos serviços</h2>

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
                    <div class="flex flex-none items-start gap-x-4">
                        <a href="{{route('site.landinpage',$item->id )}}" class="bg-[{{$config->cor_primaria}}]  rounded-md  px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">Solicitar Orçamento</a>
                    </div>
                </li>
                    @endforeach
                @endif

            </ul>

        </div>
    </div>

    <!-- Logo cloud -->
    <div class="mx-auto max-w-7xl px-6 lg:px-8 md:my-12 my-8  py-8 ">
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
    <div class="w-full bg-gray-100">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 ">
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


</div>
