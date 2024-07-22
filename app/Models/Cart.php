<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    //relationship cart to user
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    //relationship cart to product
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
