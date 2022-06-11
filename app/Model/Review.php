<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillables=[
        "stars",
        "comment",
        "date",
    ];

    public function user(){
        return $this->belongsTo("App\User");
    }
}
