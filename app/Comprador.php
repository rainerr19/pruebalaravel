<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{
    protected $table = 'compradores';
    protected $fillable = [
        'nombres', 'apellidos', 'cedula',
    ];
}
