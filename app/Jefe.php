<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jefe extends Model
{
    protected $table = 'jefe';
    protected $primaryKey = 'rfc_jefe_pk';
    protected $fillable = [
        'rfc_jefe_pk', 'nombre_jefe','apaterno_jefe', 'amaterno_jefe', 'telefono_jefe', 'correo_jefe'
    ];

    public $timestamps = false;
}
