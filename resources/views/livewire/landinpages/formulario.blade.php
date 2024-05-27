<div>


    <form   wire:submit="enviar"  class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <div class="space-y-6">

                <div>

                    <label for="services" class="block text-sm font-medium text-gray-800 pl-2">Selecione os Serviços desejados</label>

                    <div class="container mx-auto p-4 mb-4" x-data="{ tab: 'tab{{$servicos->first()->id}}' }">
                        <ul class="flex mt-6">
                            @foreach($servicos as $serv)

                                <li class="mb-2 mr-2">
                                    <a class="inline-block  p-4 font-semibold border rounded-lg shadow-lg text-[{{$cor}}" href="#"
                                       :class="{ 'text-white bg-[{{$cor}}]  ': tab === 'tab{{$serv->id}}' }"
                                       @click.prevent="tab = 'tab{{$serv->id}}'">
                                        @if($serv->imagem)
                                            <img style="max-width: 100px; margin: 10px auto" src="{{url('storage/'.$serv->imagem)}}">
                                        @endif
                                        {{$serv->nome}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="content bg-white px-4 py-4  pt-4">
                            @foreach($servicos as $item)
                                <div x-show="tab === 'tab{{$item->id}}'" x-cloak>
                                    <label for="entregaveis" class="block text-bold font-medium text-gray-800 pl-2">Selecione as entregas que deseja
                                        desejados</label>
                                    @if($item->entregaveis)
                                        @foreach($item->entregaveis as $entregavel)
                                            <div class="flex items-center py-1">
                                                <input wire:model="entregaveis" value="{{$entregavel->id}}" type="checkbox" class="h-4 w-4 text-[{{$cor}}]">
                                                <div class="flex flex-col ml-2">
                                                    <label for="{{$entregavel->id}}" class="text-gray-900 font-medium">{{$entregavel->nome}}</label>
{{--                                                    <div class="pl-2 text-xs text-justify">{!! $entregavel->descricao !!}</div>--}}
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            <div class="grid grid-cols-2 gap-y-4">
                <div class="col-span-1 pr-2">
                    <label for="about" class="block text-sm font-medium text-gray-800">Observações</label>
                    <textarea wire:model="observacao" id="about" placeholder="Descreva informações relevantes..."
                              name="about" rows="3"
                              class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500"></textarea>
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

                    <label for="name" class="mb-2 block text-sm font-medium text-gray-800">Nome</label>
                    <input wire:model="nome" type="text" name="name" id="name" autocomplete="name"
                           class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500">

                    <label for="phone" class="mb-2 block text-sm font-medium text-gray-800">Telefone</label>
                    <input wire:model="telefone" type="text" name="phone" id="phone" autocomplete="phone"
                           class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500">

                    <label for="email" class="mb-2 block text-sm font-medium text-gray-800">E-mail</label>
                    <input wire:model="email" type="email" name="email" id="email" autocomplete="email"
                           class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500">
                </div>
            </div>
            <div class="flex justify-end items-center">
                <div wire:loading>
                    <button type="button" class="flex items-center justify-center" disabled>
                        <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24"></svg>
                        <div class="pr-2">Enviando...</div>
                    </button>
                </div>
                <button type="submit"
                        class="px-4 py-2 bg-[{{$cor}}] text-white hover:text-[{{$cor}}] font-semibold rounded-md hover:bg-gray-600/10 focus:outline-none focus:ring">
                    Enviar
                </button>
            </div>
        </div>
    </form>

</div>
