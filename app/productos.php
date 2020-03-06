<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $table='productos';
    protected $fillable=[
        'nombre',
        'precio',
        'stock',
        'descripcion',
    ];

    public function setNombreAttribute($value){
        $this->attributes['nombre']=ucwords(strtolower($value));
    }

    public function setDescripcionAttribute($value){
        $this->attributes['descripcion']=ucfirst(strtolower($value));
    }



}
