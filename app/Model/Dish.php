<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        "name",
        "description",
        "ingredients",
        "price",
        "availability"
    ];

    protected $cast = [
        'availability' => 'boolean'
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
