<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Rate;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class BloglistController extends Controller
{

    public function index()
    {
        $blog = Blog::orderBy('created_at', 'desc')->paginate(3);
        // dd($blog);
        return view('frontend.blog-list',compact('blog'));
    }

    public function show(string $id)
    {
        $blog = Blog::where('id', $id)->get()->toArray();
        $blog = $blog[0];
        // dd($blog);

        $post = Blog::find($id);
        $pre = Blog::where('id', '<', $post->id)->max('id');
        $next = Blog::where('id', '>', $post->id)->min('id');    


        $rate = Rate::where('id_blog', $id)->select('rate')->get();
        $sumrate = $rate->sum('rate');

        $blogs = Rate::where('id_blog', $id)->get();
        $countblog = $blogs->count();

        $num =  round($sumrate / $countblog);
        // dd($num);


        $cmt = Comment::where('id_blog', $id)->get()->toArray();
        // dd($cmt);

        return view ('frontend.blog-single', compact('blog', 'pre', 'next', 'num', 'cmt'));
    }

    public function rate(Request $request)
    {
        $rate = Rate::create([
            'rate' => $request->rate,
            'id_blog' => $request->id_blog,
            'id_user' => $request->id_user,
        ]);
    }

    public function comment(Request $request)
    {
        $user = Auth::user();

        $cmt = Comment::create([
            'cmt' => $request->comment,
            'id_blog' => $request->id_blog,
            'id_user' => $user->id,
            'avatar_user' => $user->avatar,
            'name_user' => $user->name,
            'level' => $request->level,
        ]);    
         // dd($cmt);    
    }


    public function comment2(Request $request)
    {
        $user = Auth::user();
        $cmt = Comment::create([
            'cmt' => $request->comment,
            'id_blog' => $request->id_blog,
            'id_user' => $user->id,
            'avatar_user' => $user->avatar,
            'name_user' => $user->name,
            'level' => $request->level,
        ]);
        // dd($cmt);    
    }

    public function show2(string $id)
    {
        $blog = Blog::where('id', $id)->get()->toArray();
        $blog = $blog[0];

        $post = Blog::find($id);
        $pre = Blog::where('id', '<', $post->id)->max('id');
        $next = Blog::where('id', '>', $post->id)->min('id');    


        $rate = Rate::where('id_blog', $id)->select('rate')->get();
        $sumrate = $rate->sum('rate');

        $blogs = Rate::where('id_blog', $id)->get();
        $countblog = $blogs->count();

        $num =  round($sumrate / $countblog);
        // dd($num);

        $data = Comment::where('id_blog', $id)->get()->toArray();
        // dd($data);

        return view('frontend.blog-single2', compact('blog', 'pre', 'next', 'num', 'data'));
    }

    public function repCmt(Request $request)
    {
        $user = Auth::user();
        $repCmt = Comment::create([
            'cmt' => $request->repComment,
            'id_user' => $user->id,
            'id_blog' => $request->id_blog,
            'avatar_user' => $user->avatar,
            'name_user' => $user->name,
            'level' => $request->level,
        ]);
    }
}
