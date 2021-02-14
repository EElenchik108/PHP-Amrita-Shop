<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function likes_user()
    {
    	return $this->belongsTo('App\User');
    }
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
