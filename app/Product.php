<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function reviews()    
    {
    	return $this->hasMany('App\Review');
    }

    public function images()    
    {
    	return $this->hasMany('App\Image');
    }
    
    public function likes()
    {
    	return $this->hasMany('App\Like');
    }

    public function setSlugAttribute($value)
    {
    	$this->attributes['slug'] = empty($value) ? \Str::slug($this->attributes['name'], '-') : \Str::slug($value);

    }
    public function getImgAttribute($value){
    	return empty($value) ? '/images/no_image-250x250.png' : $value;
    }
}
