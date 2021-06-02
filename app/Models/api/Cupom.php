<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    protected $table = 'cupoms';
    protected $fillable = [
        'nome',
        'desconto',
        'modo_desconto',
    ];
}
