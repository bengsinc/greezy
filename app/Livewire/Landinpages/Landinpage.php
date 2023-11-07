<?php

namespace App\Livewire\Landinpages;

use App\Models\Formulario;
use Livewire\Component;

class Landinpage extends Component
{
    public $formulario;


    public function mount($id){
        $this->formulario = Formulario::findOrFail($id);
//        dd($this->formulario->entregavel);
    }

    public function render()
    {
        return view('livewire.landinpages.landinpage')->extends('layouts.landinpage');
    }
}
