<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CountryController extends Controller
{
    public function index()
    {
 
        $country = DB::table('country')->get()->toArray();
        return view('admin.country', compact('country'));
    }

    
    public function delete(string $id)
    {
        $del = DB::table('country')->where('id', $id)->delete();
        return view('admin.del-country', compact('del')); 
    }

    public function add()
    {
        return view('admin.add-country');
    }
    public function insert(Request $request)
    {
        DB::table('country')->insert(['name' => $request->country]);
    }
}
