<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchName = $request->search;
        if ($searchName) {
            $searchProduct = Product::where('name', 'LIKE', '%'. $searchName. '%')->get();  
        }

        return view('frontend.search', compact('searchProduct'));
    }

    public function searchAdvanced(Request $request)
    {
        $category = Category::all();
        $brand = Brand::all();
        $query = Product::query();

        if ($request->name) {
            $query->where('name', 'LIKE', '%'. $request->name. '%');
        }
         
        if ($request->price) {
            $price = explode('-', $request->price);

            $query->whereBetween('price', [$price[0], $price[1]]);    
        }
        
        if ($request->category) {
            $query->where('id_category', $request->category);
        }

        if ($request->brand) {
            $query->where('id_brand', $request->brand);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        } 

        $product = $query->paginate(6); 
        // dd($product);
    
        return view('frontend.search-advanced', compact('product', 'category', 'brand'));
    }

    public function searchPrice(Request $request)
    {
        $getPrice = explode(':', $request->price);
        $price = array_map('intval', $getPrice);
    
        $product = Product::whereBetween('price', [$price[0], $price[1]])->get()->toArray();
        
        return response()->json($product);
    }
}
