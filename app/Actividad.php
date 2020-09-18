<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividad';
    protected $primaryKey = 'id_actividad_pk';
    protected $fillable = [
        'id_actividad_pk', 'nombre_actividad','numero_dictamen', 'creditos',
        'capacidad_alumnos', 'id_area_fk' , 'id_periodo_fk' , 'rfc_responsable_fk'
    ];

    public $timestamps = false;
}
