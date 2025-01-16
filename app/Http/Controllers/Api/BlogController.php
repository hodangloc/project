<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{
    public function list()
    {
        $blog = Blog::orderBy('created_at', 'desc')->paginate(3);
        
        return response()->json([
            'blog' => $blog
        ]);
    }
}
