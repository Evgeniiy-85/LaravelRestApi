<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $hidden = array('prod_id', 'user_id');

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
