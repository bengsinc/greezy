<?php

namespace App\Models;

use Callcocam\Acl\Traits\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formulario extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function entregavel(){
        return $this->belongsToMany(Entregavel::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function servicos(){
        return $this->belongsToMany(Servico::class);
    }



//auth()->id()
}
