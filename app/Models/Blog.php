<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    public $timestamps = true;
    public $fillable = ['title', 'image', 'description', 'content', 'created_at', 'id'];
}
