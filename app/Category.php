<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
    	return $this->hasMany('App\Product');
    }

    public function setSlugAttribute($value)
    {
    	$this->attributes['slug'] = empty($value) ? \Str::slug($this->attributes['name'], '-') : \Str::slug($value);

    }
    public function getImgAttribute($value){
    	return empty($value) ? '/images/no_image-250x250.png' : $value;
    }
}
