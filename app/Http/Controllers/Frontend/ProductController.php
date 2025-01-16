<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\ProductRequest;
use Intervention\Image\Laravel\Facades\Image;


class ProductController extends Controller
{
    public function category()
    {
        $category = Category::all();
        return view('admin.category', compact('category'));
    }
    public function addcategory()
    {
        return view('admin.add-category');
    }
    public function insertcategory(Request $request)
    {
        Category::create(['name' => $request->category]);
        return redirect()->back();
    }
    public function delcategory(string $id)
    {
        $del = Category::where('id', $id)->delete();
        return redirect()->back();
    }


    public function brand()
    {
        $brand = Brand::all();
        return view('admin.brand', compact('brand'));
    }
    public function addbrand()
    {
        return view('admin.add-brand');
    }
    public function insertbrand(Request $request)
    {
        Brand::create(['name' => $request->brand]);
        return redirect()->back();
    }
    public function delbrand(string $id)
    {
        $del = Brand::where('id', $id)->delete();
        return redirect()->back();
    }


    public function addproduct()
    {
        $category = Category::all();
        $brand = Brand::all();

        return view('frontend.add-product', compact('category', 'brand'));
    }

    public function insert(ProductRequest $request)
    {
        $userId = Auth::id();
        $id_category = $request->category;
        $id_brand = $request->brand;

        $product = $request->all();
        $product['id_user'] = $userId;
        $product['id_category'] = $id_category;
        $product['id_brand'] = $id_brand;

        $data = [];
        if ($request->hasfile('img')) 
        {
            foreach ($request->file('img')  as $xx) 
            {
                $image = Image::read($xx);
          
                $name = $xx->getClientOriginalName();
                $name_2 = "hinh50_". $xx->getClientOriginalName();
                $name_3 = "hinh200_". $xx->getClientOriginalName();

                $path = public_path('uploads/product/'. $name);
                $path2 = public_path('uploads/product/'. $name_2);
                $path3 = public_path('uploads/product/'. $name_3);

                $image->save($path);
                $image->resize(50, 70)->save($path2);
                $image->resize(200, 300)->save($path3);

                $data[] = $name;
            }    
        } 
        $product['image'] = json_encode($data);
        
        if (Product::create($product)) {
            return redirect()->back()->with('success', __('Add product success.'));
        }else{
            return redirect()->back()->withErrors('Add product error.');
        }
    }

    public function myproduct()
    {
        $user = Auth::user();
        $userId = $user->id;
        $product = Product::where('id_user', $userId)->get();

        if (!empty($product)) {
            return view('frontend.my-product', compact('product')); 
        }else{
            echo "Không có sản phẩm nào";
        }
    }

    public function editproduct(string $id)
    {   
        $category = Category::all();
        $brand = Brand::all();
        $status = Product::select('id', 'status')->get()->toArray();
        $product = Product::where('id', $id)->get();

        return view('frontend.edit-product', compact('product', 'category', 'brand', 'status'));
    }

    public function update(ProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $id_category = $request->category;
        $id_brand = $request->brand;
        $data = $request->all();

        $data['id_category'] = $id_category;
        $data['id_brand'] = $id_brand;

        $imgProd = json_decode($product['image'], true);
        $imgDel = $data['imgDel'];

        foreach ($imgProd as $key => $value) {
            if (in_array($value, $imgDel)) {
                unset($imgProd[$key]);
                reset($imgProd);
            }
        }
        if (!($request->hasfile('img'))) {
            $data['image'] = json_encode($imgProd);
        }else{
            $imgAdd = $request->file('img');

            if (count($imgProd) + count($imgAdd) > 3) {
                return redirect()->back()->withErrors('Upload image error.');
            }else{
                $imgNew = [];
                foreach ($imgAdd  as $xx) 
                {
                    $image = Image::read($xx);
              
                    $name = $xx->getClientOriginalName();
                    $name_2 = "hinh50_". $xx->getClientOriginalName();
                    $name_3 = "hinh200_". $xx->getClientOriginalName();

                    $path = public_path('uploads/product/'. $name);
                    $path2 = public_path('uploads/product/'. $name_2);
                    $path3 = public_path('uploads/product/'. $name_3);

                    $image->save($path);
                    $image->resize(50, 70)->save($path2);
                    $image->resize(200, 300)->save($path3);

                    $imgNew[] = $name;
                }    
        
                $imgUpdate = array_merge($imgProd, $imgNew);
                $data['image'] = array_merge($imgProd, $imgNew);
            } 
        }
            
        if ($product->update($data)) {
            return redirect()->back()->with('success', __('Update product success.'));
        }else{
            return redirect()->back()->withErrors('Update product error.');
        }
    }

    public function delete(string $id)
    {
        $delete = Product::where('id', $id)->delete();
        return redirect()->back();
    }

    public function show()
    {
        $product = Product::orderBy('created_at', 'desc')->paginate(6);
        return view('frontend.home', compact('product'));
    }

    public function productDetail(string $id)
    {
        $product = Product::where('id', $id)->get()->toArray();
        // dd($product);
        return view('frontend.product-detail', compact('product'));
    }

    public function addtocart(Request $request)
    {
        $idProduct = $request->id_product;

        $data = Product::where('id', $idProduct)->get()->toArray();
        $product = $data[0];
        $product['qty'] = 1;

        $x = false;
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            foreach ($cart as $key => $value) {
                if ($value['id'] == $idProduct) {
                    $cart[$key]['qty'] += 1;
                    $x = true;
                    session()->put('cart', $cart);
                }
            }
        }
        
        if ($x == false) {
            session()->push('cart', $product);
        }
        // echo "<pre>";
        // var_dump(session()->get('cart'));

        if (session()->has('cart')) {
            $total = 0;
            $cart = session()->get('cart');
            foreach ($cart as $key => $value) {
                $total += $cart[$key]['qty'];
            }
        }
        echo $total; 
    }   

    public function cart()
    {
        if (session()->has('cart')) {
            $product = session()->get('cart');
            // dd($product);
        }
        return view('frontend.cart', compact('product'));
    }

    public function addCart(Request $request)
    {
        $idProduct = $request->id_product;
        $a = session()->has('cart');
        if ($a) {
            $cart = session()->get('cart');
            foreach ($cart as $key => $value) {
                if ($value['id'] == $idProduct) {
                    $cart[$key]['qty'] += 1;
                    session()->put('cart', $cart);
                }    
            }
        }
    }   

    public function delCart(Request $request)
    {
        $idProduct = $request->id_product;

        if (session()->has('cart')) {
            $cart = session()->get('cart');
            foreach ($cart as $key => $value) {
                if ($cart[$key]['id'] == $idProduct) {
                    $cart[$key]['qty'] -= 1;
                    session()->put('cart', $cart);
                }
            }
        }
    }

    public function removeCart(Request $request)
    {
        $idProduct = $request->id_product;
    
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            foreach ($cart as $key => $value) {
                if ($cart[$key]['id'] == $idProduct) {
                    unset($cart[$key]);
                    session()->put('cart', $cart);
                }
            }
        }
    }

    public function checkout()
    {
        $checkLogin = Auth::check();
        return view('frontend.checkout', compact('checkLogin'));
    }

}
