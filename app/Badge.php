<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $table = 'badges';

    public static $STATUS = [
        ['id' => 0, 'name' => 'Inactivo'],
        ['id' => 1, 'name' => 'Activo']
    ];

    public static function getBadge($quantity){
        $max_badge = Badge::orderBy('range_min', 'DESC')->firstOrFail();
        if($quantity >= $max_badge->range_min)
            return $max_badge->id;
        else {
            $badge = Badge::whereRaw("$quantity BETWEEN range_min AND range_max")->get();
            return ($badge->count()) ? $badge->first()->id : null;
        }
    }
}
