<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    public static $STATUS = [
        ['id' => 0, 'name' => 'Inactivo'],
        ['id' => 1, 'name' => 'Activo']
    ];
}
