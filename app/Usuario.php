<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'usuario_pk';

    protected $fillable = ['usuario_pk','password','id_area_fk','id_tipo_fk'];
    public $timestamps = false;
}
