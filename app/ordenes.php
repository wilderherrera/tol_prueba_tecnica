<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordenes extends Model
{
    protected $table='ordenes';
    protected  $fillable=['total',
        'id_usuarios',
        ];

    public function productos_rel(){
        return $this->belongsToMany('productos','productos_ordenes','id_productos','id');
    }
    public function usuario_rel(){
        return $this->hasOne('User','id','id_usuario');
    }


}
