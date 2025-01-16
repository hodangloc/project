<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    public $timestamps = true;
    public $fillable = ['cmt', 'id_blog', 'id_user', 'avatar_user', 'name_user', 'level'];
}
