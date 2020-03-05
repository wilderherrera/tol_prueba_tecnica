<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos_ordenes extends Model
{
    protected $table='productos_ordenes';

    protected $fillable=[
        'id_productos',
        'id_ordenes',
    ];
}
