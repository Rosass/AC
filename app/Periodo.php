<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodo';

    protected $primaryKey = 'id_periodo_pk';
    protected $fillable = ['id_periodo_pk', 'nombre_periodo','fecha_inicio','fecha_final'];

    public $timestamps = false;
}
