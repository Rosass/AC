<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsable';
    protected $primaryKey = 'rfc_responsable_pk';
    protected $fillable = [
        'rfc_responsable_pk', 'nombre_responsable','apaterno_responsable',
        'amaterno_responsable', 'telefono_responsable', 'correo_responsable', 'fecha_de_registro'
    ];

    public $timestamps = false;
}
