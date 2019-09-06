<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //public $timestamps = true;
    protected $fillable=['name', 'description', 'price', 'status','category_id'];


    //one product belongs to one category
    public function category()
    {
        return $this->belongsTo(\App\Category::class);
       // return $this->belongsTo('App\Category');
        
    }

//one product has many tags
    public function tags()
    {
        return $this->belongsToMany(\App\Tag::class, 'product_tag', 'product_id', 'tag_id');
    }
}
