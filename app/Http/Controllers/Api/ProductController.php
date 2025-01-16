<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public $successStatus = 200;

    public function productHome(){
        $getProductHome = Product::orderBy('id')->limit(6)->get()->toArray();
        return response()->json([
            'response' => 'success',
            'data' => $getProductHome
        ], $this->successStatus);
    }

    public function productWishlist() {
        
        $getAllProduct = Product::all()->toArray();
        return response()->json([
            'response' => 'success',
            'data' => $getAllProduct
        ], $this->successStatus);
    }

    public function productList() {
        $getAllProduct = Product::paginate(6);
        return response()->json([
            'response' => 'success',
            'data' => $getAllProduct
        ], $this->successStatus); 
    }

    public function productCart(Request $request) {
        
        $data = $request->json()->all();
        
        $getProduct = [];
        foreach ($data as $key => $value) {
            $get = Product::findOrFail($key)->toArray();
            $get['qty'] = $value;
            $getProduct[] = $get;
        }
        return response()->json([
            'response' => 'success',
            'data' => $getProduct
        ], $this->successStatus);
    }

    public function detail($id)
    {
        $data = Product::findOrFail($id);
        return response()->json([
            'response' => 'success',
            'data' => $data
        ], $this->successStatus);
       
    }
}
