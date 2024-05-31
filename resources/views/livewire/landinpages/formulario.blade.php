<div>


    <form   wire:submit="enviar"  class="max-w-4xl mx-auto p-6 my-8 ">
        <div class="space-y-4">

                <div>
                    <p class="text-3xl font-bold tracking-tight text-[{{$config->cor_primaria}}]
                    sm:text-4xl mb-12 text-center">Selecione os serviços desejados</p>

                    <div class="container mx-auto p-4 mb-4">
                        <ul class="flex mt-6">
                            @foreach($servicos as $serv)
                                <li class="mb-2 mr-2">
                                    <span
                                        class="inline-block p-4 font-semibold border rounded-lg shadow-lg cursor-pointer"
                                        wire:click="toggleServico('{{ $serv->id }}')"
                                        style="@if(in_array($serv->id, $servicosSelecionados)) background-color: {{ $cor }}; color: white; @else color: {{ $cor }}; @endif"
                                    >
                                        {{$serv->nome}}
                                    </span>
                                </li>
                            @endforeach
                        </ul>

                        @error('servicosSelecionados') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror


                    </div>
                </div>

            <div class="container mx-auto p-4 mb-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="col-span-1">
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-800">Seu Nome</label>
                        <input wire:model="nome" type="text" name="name" id="name" autocomplete="name"
                               class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500">
                        @error('nome') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-1">
                        <label for="email" class="mb-2 block text-sm font-medium text-gray-800">E-mail</label>
                        <input wire:model="email" type="email" name="email" id="email" autocomplete="email"
                               class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500">
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-1">
                        <label for="phone" class="mb-2 block text-sm font-medium text-gray-800">Telefone</label>
                        <input wire:model="telefone" type="text" name="phone" id="phone" autocomplete="phone"
                               class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500">
                        @error('telefone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-1">
                        <label for="empresa" class="mb-2 block text-sm font-medium text-gray-800">Empresa</label>
                        <input wire:model="empresa" type="text" name="empresa" id="empresa" autocomplete="empresa"
                               class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500">
                        @error('empresa') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-1">
                        <label for="segmento" class="mb-2 block text-sm font-medium text-gray-800">Segmento</label>
                        <input wire:model="segmento" type="text" name="segmento" id="segmento" autocomplete="segmento"
                               class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500">
                        @error('segmento') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-1">
                        <label for="orcamento" class="mb-2 block text-sm font-medium text-gray-800">Orçamento</label>
                        <select wire:model="orcamento" id="orcamento" name="orcamento" autocomplete="orcamento"
                                class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500">
                            <option>Selecione</option>
                            <option value="R$ 1.000,00 - R$ 2.000,00">R$ 1.000,00 - R$ 2.000,00</option>
                            <option value="R$ 2.000,00 - R$ 4.000,00">R$ 2.000,00 - R$ 4.000,00</option>
                            <option value="R$ 4.000,00 - R$ 8.000,00">R$ 4.000,00 - R$ 8.000,00</option>
                            <option value="Acima de R$ 8.000,00">Acima de R$ 8.000,00</option>
                        </select>
                        @error('orcamento') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="about" class="block text-sm font-medium text-gray-800">Observações</label>
                        <textarea wire:model="observacao" id="about" placeholder="Descreva informações relevantes..."
                                  name="about" rows="3"
                                  class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500"></textarea>
                        @error('observacao') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex justify-end items-center mt-4">
                    <button type="submit" wire:loading.attr="disabled"
                            class="px-4 py-2 bg-[{{$cor}}] text-white hover:text-[{{$cor}}] font-semibold rounded-md hover:bg-gray-600/10 focus:outline-none focus:ring">
                        <div class="flex items-center space-x-2">
                            <span>Enviar</span>
                            <svg wire:loading class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </button>
                </div>
            </div>



        </div>
    </form>


</div>
