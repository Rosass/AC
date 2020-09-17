<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipo_usuario';
    protected $primaryKey = 'id_tipo_pk';

    protected $fillable = ['id_tipo_pk', 'nombre_tipo'];

    public $timestamps = false;
}
