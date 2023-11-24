<?php

namespace App\Models;

use Callcocam\Acl\Traits\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use HasFactory, HasUlids, SoftDeletes;
    protected $appends = ['entregavel'];

    protected $guarded = [
        'id'
    ];

    public function entregaveis(){
        return $this->hasMany(PedidoEntregavel::class, 'pedido_id');
    }
    public function listaentregaveis(){
        return $this->belongsToMany(Entregavel::class, 'pedido_entregavel');
    }
    public function getEntregavelAttribute(){
        return $this->listaentregaveis()->pluck( 'descricao', 'nome');
    }
}
