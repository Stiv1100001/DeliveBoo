<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillables=[
        "name",
        "description",
        "prezzo",
        "availability"
    ];

    public function order(){
        return $this->hasMany("App\Model\Order");
    }
}
