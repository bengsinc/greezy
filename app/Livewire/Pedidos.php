<?php

namespace App\Livewire;

use Livewire\Component;

class Pedidos extends Component
{
    public function mount($id){
       dd($id);
    }

    public function render()
    {
        return view('livewire.pedidos')->extends('layouts.landinpage');
    }
}
