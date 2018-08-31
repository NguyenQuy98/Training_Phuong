<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'main_image', 
        'description',
        'price',
        'expired_time',
        'amount',
        'category_id',
        'is_featured',
        'status',
        'new_price',
        'short_description',
        'flag'
    ];
   
        
    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    // protected $table = "products";
    // protected $primaryKey = "id";
    public $timestamps = false;
    public function sizes()
    {
        return $this->belongsToMany('App\Size');
    }
    public function User()
    {
        return $this->belongsToMany('App\User');
    }
}