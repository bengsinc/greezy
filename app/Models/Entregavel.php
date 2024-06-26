<?php

namespace App\Models;

use Callcocam\Acl\Traits\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entregavel extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $guarded = [
        'id'
    ];
    public function servico(){
        return $this->belongsTo(Servico::class, 'entregavel_id');
    }
}
