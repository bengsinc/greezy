<?php

namespace App\Livewire\Landinpages;

use App\Models\Pedido;
use App\Models\PedidoEntregavel;
use App\Models\Servico;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class Formulario extends Component
{
    public $servicos;
    public $cor;
    public $formulario;
    public $pedido_id;

    public $entregaveis = [];
    public $observacao;
    public $orcamento;
    public $tipo_pagamento;
    public $forma_pagamento;
    public $nome;
    public $telefone;
    public $email;

    public function mount($form_id, $cor)
    {
        $this->formulario = \App\Models\Formulario::query()->where('id', $form_id)->first();
        $this->servicos = $this->formulario->servicos;
        $this->cor = $cor;
    }

    public function render()
    {
        return view('livewire.landinpages.formulario')->extends('layouts.landinpage');
    }


    public function enviar()
    {
        DB::transaction(function () {
            $ultimoPedido = Pedido::query()->first();


            if ($ultimoPedido) {
                $ultimoNumero = $ultimoPedido->numero;
            } else {
                $ultimoNumero = 1;
            }

            $pedido = new Pedido();

            $pedido->numero = $ultimoNumero + 1;
            $pedido->observacao = $this->observacao;
            $pedido->orcamento = $this->orcamento;
            $pedido->tipo_pagamento = $this->tipo_pagamento;
            $pedido->forma_pagamento = $this->forma_pagamento;
            $pedido->nome = $this->nome;
            $pedido->email = $this->email;
            $pedido->telefone = $this->telefone;
            $pedido->status = "aguardando análise";
            $pedido->cliente_id = $this->formulario->user_id;
            $pedido->formulario_id = $this->formulario->id;

            $pedido->save();

            $this->pedido_id = $pedido->id;

            if ($this->entregaveis) {
                foreach ($this->entregaveis as $item) {

                    $entregavel = new PedidoEntregavel();

                    $entregavel->pedido_id = $pedido->id;
                    $entregavel->entregavel_id = $item;

                    $entregavel->save();
                }
            }
        });


        return redirect()->route('site.pedido', $this->pedido_id);
        // dd($this->tipo_pagamento, $this->entregaveis, $this->observacao, $this->orcamento, $this->forma_pagamento, $this->nome, $this->telefone, $this->email);
    }
}
