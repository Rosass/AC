<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';

    protected $primaryKey = 'id_area_pk';
    protected $fillable = ['id_area_pk', 'nombre_area','rfc_jefe_fk'];

    public $timestamps = false;
}
