<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adelanto extends Model
{
    protected $table ='adelantos';
    protected $fillable = [
        'descripcion', 'fecha', 'monto',
    ];
}
