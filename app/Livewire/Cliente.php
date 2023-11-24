<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Cliente extends Component
{
    public $formularios;
    public $cliente;
    public $config;
    public function mount(User $user){
         $this->config = $user->config;
         $this->cliente = $user;
        if($user->formularios){
            $this->formularios = $user->formularios;
        }

    }
    public function render()
    {
        return view('livewire.cliente')->extends('layouts.landinpage');
    }
}
