<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordenes extends Model
{
    protected $table='ordenes';
    protected  $fillable=['total',
        'id_usuario',
        ];

}
