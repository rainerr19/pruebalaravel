<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    protected $table = 'boletas';
    protected $fillable = ['nombre_evento','descrip','fecha_cierre','limite'];
}
