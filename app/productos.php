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
        'imagen_producto',
    ];

    public function getImagenProductoAttribute($value){
            return '/storage/'.$value;
    }
    public function setNombreAttribute($value){
        $this->attributes['nombre']=ucwords(strtolower($value));
    }

    public function setDescripcionAttribute($value){
        $this->attributes['descripcion']=ucfirst(strtolower($value));
    }

        public function ordenes_rel(){
            return $this->belongsToMany('ordenes','productos_ordenes','id_ordenes','id');
        }

}
