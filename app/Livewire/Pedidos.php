<?php

namespace App\Livewire;

use App\Models\Config;
use App\Models\Pedido;
use App\Models\Servico;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Pedidos extends Component
{

    public $pedido;
    public $config;
    public $descricao_aceite;

    public $preferencia_pagamento;

    public $aceite = null;

    public function mount(Pedido $pedido){
       $this->pedido =  $pedido;
       $this->config =  Config::query()->where('user_id', $pedido->cliente->id)->first();

//dd($this->config->cor_primaria);


    }

    #[Computed]
    public function servicos(){


        if($entregaveis = $this->pedido->listaentregaveis){
            $servicosIds =[];
            foreach($entregaveis as $item){
                $servicosIds[] = $item->servico_id;
            }
            return Servico::query()->whereIn('id', $servicosIds)->get();

        }
        return null;
    }

    public function aceitar(){
        $this->pedido->update(
            [
                'forma_pagamento' =>$this->preferencia_pagamento,
                'aceite' => 'sim',
                'data_aceite' => now(),
                'status' => 'aceito',
            ]
        );
    }

    public function recusar(){

        $this->validate([
            'descricao_aceite' => 'required|min:10',
        ], [
            'descricao_aceite.required' => 'A descrição do motivo da recusa é obrigatória.',
            'descricao_aceite.min' => 'A descrição da recusa deve ter pelo menos :min caracteres.',
        ]);



        $this->pedido->update(
                [
                    'aceite' => 'não',
                    'data_aceite' => now(),
                    'descricao_aceite' => $this->descricao_aceite,
                    'status' => 'aguardando análise',
                ]
            );
    }

    public function render()
    {
        return view('livewire.pedidos')->extends('layouts.landinpage');
    }
}
