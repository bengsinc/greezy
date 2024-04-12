<div  x-data="object" x-init="function()" x-cloak >
    <div class="bg-greezy">

        <div class="container max-w-screen-7xl px-4 md:px-72 py-4 mx-auto">
            <div class="flex items-center justify-between py-14">
                <div>
                    <h1 class="text-[#1E4141] text-xl">Proposta elaborada para <span
                            class="font-bold">{{$pedido->nome}}</span>.</h1>
{{--                    <p class="text-[#1E4141] text-xl font-bold">Serviços de assessoria de marketing.</p>--}}
                </div>
                @if($config->logo)
                    <img src="{{url('storage/'.$config->logo)}}" class="mx-auto w-[200px] mb-4">
                @endif

            </div>
            <div class="grid grid-cols-12 gap-4 py-10">
                <div class="col-span-12 md:col-span-6">
                    <img src="{{url('')}}/img/sobre.png" alt="Sobre nós">
                </div>
                <div class="col-span-12 md:col-span-6 flex flex-col justify-center px-4 md:px-14">
                    <h1 class="text-[#1E4141] text-xl font-bold">Sobre nós:</h1>
                    <p class="text-[#1E4141] text-xl">
                        {!! $config->descricao !!}
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-[#A3E0C2]">
            <div class="container max-w-screen-7xl px-4 md:px-72 py-4 mx-auto">
                <h1 class="text-center font-bold text-2xl text-[#1E4141] py-4">Empresas que confiam em nossos serviços:</h1>
                <div class="py-20">
                    <div class="swiper mySwiper  px-10">
                        <div class="swiper-wrapper">
                            @if($config->logos_clientes)
                                @foreach($config->logos_clientes as $item)
                                    <div class="swiper-slide">
                                        <div class="bg-white">
                                            <img class="p-4" src="{{url('storage').'/'.$item}}"    alt="Imagem">
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                        <div class="swiper-button-next text-white"></div>
                        <div class="swiper-button-prev text-white"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container max-w-screen-7xl px-4 md:px-72 py-4 mx-auto">


            <div class="grid grid-cols-12 gap-4 py-10">
                <div class="col-span-12 md:col-span-4 flex items-center justify-center flex-col">
                    <h1 class="text-[#1E4141] text-2xl font-bold">Serviços que incluímos na sua proposta:</h1>
                    <div class="py-5">

                        @forelse($this->servicos as $item)
                            <div class="flex items-center pt-1">
                                <i class="bi bi-check-lg text-[#00C864] font-bold text-2xl"></i>
                                <p class="pl-2 text-xl">{{$item->nome}}</p>
                            </div>
                        @empty
                        @endforelse


                    </div>
                    <div>
                        <p class="text-lg">Abaixo você encontra a descrição e as entregas de cada serviço.</p>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-8 flex flex-col justify-center px-4 md:px-14">
                    <img src="{{url('')}}/img/bg-servicos.png" alt="Serviços">
                </div>
            </div>
        </div>

        <div class="container max-w-screen-7xl px-4 md:px-72 py-4 mx-auto">
            <div class="text-center py-14">
                <h1 class="text-[#1E4141] text-2xl font-bold">Descrição do pacote escolhido:</h1>
            </div>

            @forelse($this->servicos as $item)
                <div class="border-2 rounded-2xl border-[#79DDAB]">
                    <div class="px-4 py-8">
                        <div class="grid grid-cols-12 gap-x-2">
                            <div class="col-span-12 md:col-span-1">
                                <img class="w-20" src="{{url('')}}/img/1.png" alt="Imagem">
                            </div>
                            <div class="col-span-12 md:col-span-3">
                                <h2 class="pl-3 text-xl font-bold text-[#1E4141]">{{$item->nome}}</h2>
                            </div>
                            <div class="col-span-12 md:col-span-8 text-[#1E4141] text-justify">
                                {!! $item->descricao !!}
                            </div>
                        </div>
                        <div class="pt-8">
                            <h2 class="text-xl text-center font-bold text-[#1E4141]">Itens de entrega:</h2>
                        </div>
                        <div class="grid grid-cols-12 gap-4 pt-5">

                            @if($entregaveis = \App\Models\PedidoEntregavel::query()->where('servico_id', $item->id)->get())

                                @foreach($entregaveis as $entregavel)
                                    <div class="col-span-12 md:col-span-6 bg-[#46D38D] rounded-2xl	 p-4">
                                        <div class="flex items-center justify-around">
                                            <img class="w-20" src="{{url('')}}/img/2.png" alt="Imagem">
                                            <h2 class="text-white font-bold text-xl">{{$entregavel->nome}}</h2>
                                        </div>
                                        <span class="text-white text-lg p-5">{!! $entregavel->descricao !!}</span>
                                    </div>
                                @endforeach
                            @endif


                        </div>


                    </div>
                </div>
            @empty
            @endforelse



            <div class="bg-[#C0E8D4] rounded-2xl my-14">
                <div class="grid grid-cols-12 p-8">
                    <div class="col-span-12 md:col-span-4 flex justify-center flex-col px-4">
                        <img class="w-20" src="{{url('')}}/img/6.png" alt="Imagem">
                        <p class="text-[#1E4141] py-3 text-lg">Investimento de <span
                                class="font-bold">R$ 1.300 mensais</span>.</p>
                    </div>
                    <div class="col-span-12 md:col-span-4 flex justify-center flex-col px-4">
                        <img class="w-20" src="{{url('')}}/img/7.png" alt="Imagem">
                        <p class="text-[#1E4141] py-3 text-lg">Vigência mínima de<span class="font-bold">12 meses</span>.
                        </p>
                    </div>
                    <div class="col-span-12 md:col-span-4 px-4">
                        <p class="text-[#1E4141] py-3 text-lg font-bold">Aceite da proposta: </p>
                        <button class="flex items-center justify-center bg-[#00c864] py-1 px-4 rounded-2xl">
                            <i class="bi bi-check-circle-fill text-white text-2xl"></i>
                            <span class="text-white pl-2 font-bold">Aceitar proposta</span>
                        </button>
                        <button class="flex items-center justify-center bg-[#145A5A] py-1 px-4 rounded-2xl mt-2">
                            <i class="bi bi-person-circle text-white text-2xl"></i>
                            <span class="text-white pl-2 font-bold">Entrar em contato</span>
                        </button>
                        <button class="flex items-center justify-center bg-[#f43d4c] py-1 px-4 rounded-2xl mt-2">
                            <i class="bi bi-x-circle-fill text-white text-2xl"></i>
                            <span class="text-white pl-2 font-bold">Recusar proposta</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="py-5">
                <h3 class="text-center text-xl pt-5 pb-10">São Miguel do Oeste/SC, 22 de março de 2024.</h3>
                <div class="flex items-center justify-center py-10">
                    @if($config->logo)
                        <img src="{{url('storage/'.$config->logo)}}" class="mx-auto w-[200px] mb-4">
                    @endif
                </div>
            </div>
        </div>
    </div>


    <style>


        .bg-greezy {
            background: url("{{url('')}}/img/bg-modelo.png");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
    </script>
    <h1>Dados do pedido</h1>

    @if($pedido)
        @if($pedido->status == 'aguardando cliente')

            <div x-data="{ showConfirmDialog: false }">
                <!-- Botão para mostrar o diálogo de confirmação -->
                <button @click="showConfirmDialog = true">Aceitar</button>

                <!-- Diálogo de confirmação -->
                <div x-show="showConfirmDialog" style="background: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%;">
                    <div style="background: white; padding: 20px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <p>Tem certeza que deseja aceitar?</p>
                        <button @click="showConfirmDialog = false; $wire.aceitar()">Sim</button>
                        <button @click="showConfirmDialog = false">Não</button>
                    </div>
                </div>
            </div>

            <div x-data="{ showConfirmDialog: false }">
                <!-- Botão para mostrar o diálogo de confirmação -->
                <button @click="showConfirmDialog = true">Recusar</button>

                <!-- Diálogo de confirmação -->
                <div x-show="showConfirmDialog" style="background: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%;">
                    <div style="background: white; padding: 20px;
                     position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <p>Digite o motivo da recusa?</p>
                        <input class="border w-full" type="text" wire:model="descricao_aceite" required>
                        <br/>
                        <button @click="showConfirmDialog = false; $wire.recusar()">Recusar</button>
                        <button @click="showConfirmDialog = false">Fechar</button>
                    </div>
                </div>

                @error('descricao_aceite') <span class="error" style="background: red">{{ $message }}</span> @enderror

            </div>


        @elseif($pedido->status == 'aguardando análise')
            <p>Seu pedido esta sendo analisado pelo setor responável da empresa {{$pedido->cliente->name}}</p>
        @else
            Status do pedido: {{$pedido->status}}
            <br/>
            Aguarde nosso contato por favor.
        @endif
    @endif

</div>
