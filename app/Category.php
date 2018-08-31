<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug', 
        'perent_id',
        'status',
    ];
    public function product_category()
    {
        return $this->hasMany('App\Product');
    }

}
