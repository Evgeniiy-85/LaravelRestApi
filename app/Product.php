<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $hidden = array('pivot');

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'prod_in_cat', 'prod_id', 'cat_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review','prod_id');
    }
}
