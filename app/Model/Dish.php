<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillables = [
        "name",
        "description",
        "price",
        "availability"
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    } 

    public function order()
    {
        return $this->belongsToMany("App\Model\Order")->withPivot("quantity");
    }
}
