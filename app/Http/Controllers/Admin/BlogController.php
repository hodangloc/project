<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return view('admin.blog.list', compact('blog'));
    }

    public function edit(string $id)
    {
        $blog = Blog::where('id', $id)->get();
        return view('admin.blog.edit', compact('blog'));
    }

    
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $data = $request->all();
        $file = $request->image;

        if (!empty($file)) {
            $data['image'] = $file->getClientOriginalName();
        }
        if ($blog->update($data)) {
            if (!empty($file)) {
                $file->move('uploads/blog', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Update blog success.'));
        }else{
            return redirect()->back()->withErrors('Update blog error.');
        }
    }

    
    public function delete(string $id)
    {
        $delete = Blog::where('id', $id)->delete();
        return view('admin.blog.delete', compact('delete'));
    }

    public function add()
    {
        return view('admin.blog.add');
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $file = $request->image;

        if (!empty($file)) {
            $data['image'] = $file->getClientOriginalName();
        }

        if (Blog::create($data)) {
            if (!empty($file)) {
                $file->move('uploads/blog', $file->getClientOriginalName());
            }
            echo "Add blog success";
        }else{
            echo "Add blog error";
        }
    }
}
