<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        //relationship connection with User table
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function product()
    {
        //relationship connection with User table
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
