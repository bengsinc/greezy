<?php

namespace App\Livewire\Landinpages;

use App\Models\Entregavel;
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

                    $ent = Entregavel::find($item);


                    $entregavel = new PedidoEntregavel();

                    $entregavel->pedido_id = $pedido->id;
                    $entregavel->entregavel_id = $item;
                    $entregavel->nome = $ent->nome;
                    $entregavel->descricao = $ent->descricao;
                    $entregavel->servico_id = $ent->servico_id;

                    $entregavel->save();
                }
            }
        });


        return redirect()->route('obrigado');
    }
}
