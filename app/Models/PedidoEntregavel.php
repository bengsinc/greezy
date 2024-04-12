<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoEntregavel extends Model
{
    use HasFactory;
    use HasUlids;

    protected $guarded = [
        'id'
    ];

    public function servico(){
        return $this->belongsTo(Servico::class);
    }



    protected $table = 'pedido_entregavel';
}
