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

    public static function productWithData() {
        return self::select(['products.id', 'products.name', 'products.description', 'products.short_description', 'products.price'])
                ->with(['categories' => function ($query) {
                    $query->select(['categories.id', 'categories.name', 'categories.description']);
                }])
                ->with(['reviews' => function ($query) {
                    $query
                        ->select(['id', 'review', 'rating', 'prod_id', 'user_id'])
                        ->with(['user' => function ($query) {
                            $query->select(['users.id', 'users.name']);
                        }]);
                }]);
    }
}
