<div>


    <form   wire:submit="enviar"  class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <div class="space-y-6">
            <div>
                <label for="services" class="block text-sm font-medium text-gray-800 pl-2">Selecione os Serviços
                    desejados</label>
                <div class="mt-2 space-y-2">
                    @forelse($servicos as $item)
                        @if($item->entregaveis)
                            <div class="border rounded-md px-3 py-2">
                                <h1 class="text-center text-xl">{{$item->nome}}</h1>
                                @foreach($item->entregaveis as $entregavel)
                                    <div class="flex items-center py-1">
                                        <input wire:model="entregaveis" value="{{$entregavel->id}}" type="checkbox"
                                               class="h-4 w-4 text-[{{$cor}}]">
                                        <div class="flex flex-col">
                                            <label for="{{$entregavel->id}}"
                                                   class="ml-2 text-gray-900 font-medium">{{$entregavel->nome}}</label>
                                            <div class="pl-2 text-xs text-justify">{!! $entregavel->descricao !!}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
            <div>
                <label for="about" class="block text-sm font-medium text-gray-800">Observações</label>
                <textarea wire:model="observacao" id="about" placeholder="Descreva informações relevantes..."
                          name="about" rows="3"
                          class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500"></textarea>
            </div>
            <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-6">
                <div class="sm:col-span-6">
                    <label for="orcamento" class="block text-sm font-medium text-gray-800">Orçamento</label>
                    <select wire:model="orcamento" id="orcamento" name="orcamento" autocomplete="orcamento"
                            class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500">
                        <option>Selecione</option>
                        <option value="R$ 1.000,00 - R$ 2.000,00">R$ 1.000,00 - R$ 2.000,00</option>
                        <option value="R$ 2.000,00 - R$ 4.000,00">R$ 2.000,00 - R$ 4.000,00</option>
                        <option value="R$ 4.000,00 - R$ 8.000,00">R$ 4.000,00 - R$ 8.000,00</option>
                        <option value="Acima de R$ 8.000,00">Acima de R$ 8.000,00</option>
                    </select>
                </div>

                <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-800">Nome</label>
                    <input wire:model="nome" type="text" name="name" id="name" autocomplete="name"
                           class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500">
                </div>
                <div class="sm:col-span-6">
                    <label for="phone" class="block text-sm font-medium text-gray-800">Telefone</label>
                    <input wire:model="telefone" type="text" name="phone" id="phone" autocomplete="phone"
                           class="block w-full px-3 py-2 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring focus:border-indigo-500">
                </div>
                <div class="sm:col-span-6">
                    <label for="email" class="block text-sm font-medium text-gray-800">E-mail</label>
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
