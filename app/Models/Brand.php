<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';
    public $timestamps = true;
    public $fillable = ['id', 'name'];
}
