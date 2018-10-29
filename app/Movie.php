<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['user_id','shop_id', 'tmdb_id', 'category_id'];
    //
}
