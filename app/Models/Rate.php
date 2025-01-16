<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    protected $table = 'rate';
    public $timestamps = true;
    public $fillable = ['rate', 'id_blog', 'id_user', 'created_at'];
}
