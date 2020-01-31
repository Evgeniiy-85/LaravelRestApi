<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $hidden = array('pivot');

    public function products()
    {
        return $this->belongsToMany('App\Product', 'prod_in_cat', 'cat_id', 'prod_id');
    }
}
