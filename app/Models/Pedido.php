<?php

namespace App\Models;

use Callcocam\Acl\Traits\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'servicos_selecionados' => 'array'
    ];

    public function listaentregaveis(){
            return $this->hasMany(PedidoEntregavel::class,  'pedido_id');
    }




    public function cliente(){
        return $this->belongsTo(User::class, 'cliente_id');
    }


}
