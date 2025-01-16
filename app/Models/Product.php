<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    public $timestamps = true;
    public $fillable = ['id_user', 'name', 'price', 'id_category', 'id_brand', 'status', 'sale', 'company', 'image', 'detail'];
}
