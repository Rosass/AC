<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripcion';
    protected $primaryKey = 'id_inscripcion_pk';
    protected $fillable = [
        'id_inscripcion_pk', 'num_control','fecha_inscripcion', 'id_periodo_fk',
        'id_actividad_fk'
    ];

    public $timestamps = false;
}
