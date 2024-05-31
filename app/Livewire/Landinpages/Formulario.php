<?php

namespace App\Livewire\Landinpages;

use App\Models\Entregavel;
use App\Models\Pedido;
use App\Models\PedidoEntregavel;
use App\Models\Servico;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class Formulario extends Component
{
    public $servicos;
    public $servicosSelecionados = [];
    public $cor;
    public $formulario;
    public $pedido_id;

    public $observacao;
    public $orcamento;
    public $nome;
    public $empresa;
    public $segmento;
    public $telefone;
    public $email;
    public $config;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telefone' => 'required|string|max:15',
        'empresa' => 'required|string|max:255',
        'segmento' => 'required|string|max:255',
        'orcamento' => 'required|string|max:255',
        'observacao' => 'nullable|string|max:1000',
        'servicosSelecionados' => 'required',
        'servicosSelecionados' => 'required|array|min:1',
    ];

    protected function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser uma string.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais de 255 caracteres.',
            'telefone.required' => 'O telefone é obrigatório.',
            'telefone.string' => 'O telefone deve ser uma string.',
            'telefone.max' => 'O telefone não pode ter mais de 15 caracteres.',
            'empresa.required' => 'A empresa é obrigatória.',
            'empresa.string' => 'A empresa deve ser uma string.',
            'empresa.max' => 'A empresa não pode ter mais de 255 caracteres.',
            'segmento.required' => 'O segmento é obrigatório.',
            'segmento.string' => 'O segmento deve ser uma string.',
            'segmento.max' => 'O segmento não pode ter mais de 255 caracteres.',
            'orcamento.required' => 'O orçamento é obrigatório.',
            'orcamento.string' => 'O orçamento deve ser uma string.',
            'orcamento.max' => 'O orçamento não pode ter mais de 255 caracteres.',
            'observacao.string' => 'A observação deve ser uma string.',
            'observacao.max' => 'A observação não pode ter mais de 1000 caracteres.',
            'servicosSelecionados.required' => 'Pelo menos um serviço deve ser selecionado.',
            'servicosSelecionados.array' => 'Os serviços selecionados devem ser um array.',
            'servicosSelecionados.min' => 'Selecione pelo menos um serviço.',
        ];
    }

    public function mount($form_id, $cor)
    {
        $this->formulario = \App\Models\Formulario::query()->where('id', $form_id)->first();
        $this->servicos = $this->formulario->servicos;
        $this->cor = $cor;
        $this->config = $this->formulario->user->config;
    }

    public function render()
    {
        return view('livewire.landinpages.formulario')->extends('layouts.landinpage');
    }
    public function toggleServico($servicoId)
    {
        if (in_array($servicoId, $this->servicosSelecionados)) {
            $this->servicosSelecionados = array_diff($this->servicosSelecionados, [$servicoId]);
        } else {
            $this->servicosSelecionados[] = $servicoId;
        }
    }

    public function enviar()
    {
        $this->validate();


        DB::transaction(function () {
            $ultimoPedido = Pedido::query()->latest()->first();

            $proximoNumero = $ultimoPedido ? $ultimoPedido->numero + 1 : 1;


            $pedido = new Pedido();
            $pedido->servicos_selecionados = json_encode($this->servicosSelecionados); // Adiciona os IDs dos serviços selecionados

            $pedido->numero = $proximoNumero;
            $pedido->observacao = $this->observacao;
            $pedido->orcamento = $this->orcamento;
            $pedido->empresa = $this->empresa;
            $pedido->segmento = $this->segmento;
            $pedido->nome = $this->nome;
            $pedido->email = $this->email;
            $pedido->telefone = $this->telefone;
            $pedido->status = "aguardando análise";
            $pedido->cliente_id = $this->formulario->user_id;
            $pedido->formulario_id = $this->formulario->id;
            $pedido->save();

            $this->pedido_id = $pedido->id;

//           orcamento, empresa, os, segmento, nome, email, telefone


        });


        return redirect()->route('obrigado');
    }
}
