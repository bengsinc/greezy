<?php

namespace App\Models;

use Callcocam\Acl\Traits\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servico extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function entregaveis(){
       return $this->hasMany(Entregavel::class);
    }


}
