<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    protected $table ='empleados';


    protected $fillable = [
        'nombre', 'apellido', 'ci','direccion','telefono',
    ];
}
