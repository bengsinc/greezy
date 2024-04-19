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

        <div class="bg-[{{$this->config->cor_secundaria}}]">
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
                                <i class="bi bi-check-lg text-[{{$this->config->cor_primaria}}] font-bold text-2xl"></i>
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
                <div class="border-2 rounded-2xl mb-8 border-[#79DDAB]">
                    <div class="px-4 py-8">
                        <div class="grid grid-cols-12 gap-x-2">
                            @if($item->imagem)
                            <div class="col-span-12 md:col-span-1">
                                <img class="w-20" src="{{url('/storage/')}}/{{$item->imagem}}" alt="Imagem">
                            </div>
                            @endif
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
                                    <div class="col-span-12 md:col-span-6 bg-[{{$this->config->cor_primaria}}] rounded-2xl	 p-4">
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



            <div class="bg-[{{$this->config->cor_secundaria}}] rounded-2xl my-14">
                <div class="grid grid-cols-12 p-8">
                    <div class="col-span-12 md:col-span-4 flex justify-center flex-col px-4">
                        <img class="w-20" src="{{url('')}}/img/6.png" alt="Imagem">
                        <p class="text-[#1E4141] py-3 text-lg">Investimento de <span
                                class="font-bold">R$ {{$pedido->investimento}}</span>.</p>
                    </div>
                    <div class="col-span-12 md:col-span-4 flex justify-center flex-col px-4">
                        <img class="w-20" src="{{url('')}}/img/7.png" alt="Imagem">
                        <p class="text-[#1E4141] py-3 text-lg">Duração do projeto <span class="font-bold">{{$pedido->duracao_projeto}}</span>.
                        </p>
                    </div>
                    <div class="col-span-12 md:col-span-4 px-4">
                        <p class="text-[#1E4141] py-3 text-lg font-bold">Aceite da proposta: </p>

                            @if($pedido->status == 'aguardando cliente')
                            <div x-data="{ showConfirmDialog: false }">
                                <button @click="showConfirmDialog = true" class="flex items-center justify-center bg-[#00c864] py-1 px-4 rounded-2xl">
                                    <i class="bi bi-check-circle-fill text-white text-2xl"></i>
                                    <span class="text-white pl-2 font-bold">Aceitar proposta</span>
                                </button>
                                <!-- Diálogo de confirmação -->
                                <div x-show="showConfirmDialog" style="background: rgba(0, 0, 0, 0.5); position: fixed;
                                top: 0; left: 0;  width: 100%; height: 100%;">
                                    <div style="background: white; padding: 20px; position: absolute;
                                     top: 50%; left: 50%; transform: translate(-50%, -50%);  border-radius: 10px;">

                                        <p>Aceitar proposta</p>

                                        <select wire:model="preferencia_pagamento" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                            <option selected>Selecione a preferência de pagamento</option>
                                            <option value="Transferência bancária">Transferência bancária</option>
                                            <option value="Pix">Pix</option>
                                            <option value="Dinheiro">Dinheiro</option>
                                            <option value="Cartão de débito">Cartão de débito</option>
                                            <option value="Cartão de crédito">Cartão de crédito</option>
                                        </select>

                                        <br/>
                                        <button @click="showConfirmDialog = false; $wire.aceitar()"
                                                class="rounded bg-indigo-50 px-2 py-1 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">Enviar</button>
                                    </div>
                                </div>
                            </div>


{{--                        <button class="flex items-center justify-center bg-[#145A5A] py-1 px-4 rounded-2xl mt-2">--}}
{{--                            <i class="bi bi-person-circle text-white text-2xl"></i>--}}
{{--                            <span class="text-white pl-2 font-bold">Entrar em contato</span>--}}
{{--                        </button>--}}

                            <div x-data="{ showConfirmDialog: false }">
                                <!-- Botão para mostrar o diálogo de confirmação -->
                                <button @click="showConfirmDialog = true" class="flex items-center justify-center bg-[#f43d4c] py-1 px-4 rounded-2xl mt-2">
                                    <i class="bi bi-x-circle-fill text-white text-2xl"></i>
                                    <span class="text-white pl-2 font-bold">Recusar proposta</span>
                                </button>
                                <!-- Diálogo de confirmação -->
                                <div x-show="showConfirmDialog" style="background: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%;">
                                    <div style="background: white; padding: 20px;
                     position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);border-radius: 10px; min-width: 300px">
                                        <p>Digite o motivo da recusa?</p>
                                        <input class="block flex-1 border w-full bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" type="text" wire:model="descricao_aceite" required>
                                        <br/>
                                        <div class="flex justify-around">
                                            <button class="rounded bg-indigo-50 px-2 py-1 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100" @click="showConfirmDialog = false; $wire.recusar()">Recusar</button>
                                            <button class="rounded bg-indigo-50 px-2 py-1 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100" @click="showConfirmDialog = false">Fechar</button>

                                        </div>
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

</div>
