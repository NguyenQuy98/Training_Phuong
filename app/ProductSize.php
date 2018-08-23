<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    public function imageable()
    {
        return $this->morphTo();
    }
}
