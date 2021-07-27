<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\orders;
use App\Models\products;
use App\Models\receipts;
use App\Models\sellers;
use App\Models\users;
use App\Models\carts;
use App\Models\cards;
use App\Models\brands;
use App\Models\se_categories as s_cat;
use App\Models\users_has_cards;
use App\Http\Controllers\Controller;
use App\Models\se_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function user()
    {
        $users = users::all();
        return view('admin/user/user', compact('users'));
    }

    public function userDetail($id)
    {
        $user = users::find($id);
        return view('admin/user/userDetail', compact('user'));
    }

    public function seller()
    {
        $sellers = sellers::all();
        return view('admin/seller/seller', compact('sellers'));
    }
    public function sellerDetail($id)
    {
        $sellerHasProductCount = DB::table('products')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('sellers.id', $id)
            ->count();
        $sellerHasProduct = DB::table('products')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('sellers.id', $id)
            ->select('products.*', 'sellers.store_name', 'sellers.phone', 'sellers.address')->get();
        $seller = sellers::find($id);
        return view('admin/seller/sellerDetail', compact('seller', 'sellerHasProduct', 'sellerHasProductCount'));
    }
    public function brand()
    {
        $brands = brands::all();
        return view('/admin/brand/brand', compact('brands'));
    }

    public function addBrand()
    {
        return view('admin/brand/addBrand');
    }

    public function storeBrand(Request $req)
    {
        $brand = new brands();
        $brand->name = $req->name;
        if ($req->hasFile('brand_img')) {
            $file = $req->file('brand_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/brandImages', $filename);
            $brand->brand_img = $filename;
        } else {
            return $req;
            $brand->brand_img = '';
            echo "Error";
        }
        $brand->save();
        return redirect('/admin/brand')->with('brand_add', '100%');
    }

    public function category()
    {
        $categories = categories::all();
        return view('admin/category/category', compact('categories'));
    }
    public function addCategory()
    {
        return view('admin/category/addcategory');
    }
    public function storeCategory(Request $req)
    {
        $category = new categories();
        $category->name = $req->name;
        if ($req->hasFile('category_img')) {
            $file = $req->file('category_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/categoryImages', $filename);
            $category->category_img = $filename;
        } else {
            return $req;
            $category->category_img = '';
            echo "Error";
        }
        $category->save();
        return redirect('/admin/category/category')->with('brand_add', '100%');
    }
    public function secondaryCategory()
    {
        $seCategory = se_categories::all();
        return view('admin/2ndCategory/secondaryCategory', compact('seCategory'));
    }
    public function addSecondaryCategory()
    {
        $data_category = categories::all();
        return view('admin/2ndCategory/addsecondarycategory', compact('data_category'));
    }
    public function storeSecondCategory(Request $req)
    {
        $var = new s_cat();
        $var->category_id = $req->id;
        $var->name = $req->name;

        if ($req->hasFile('secondarycategory_img')) {
            $file = $req->file('secondarycategory_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/secondCategory', $filename);
            $var->secondarycategory_img = $filename;
        } else {
            return $req;
            $var->secondarycategory_img = '';
            echo "Error";
        }
        // ModelsSecondarycategories::create($var);

        $var->save();


        return redirect('/admin')->with('brand_add', '100%');
    }

    public function product()
    {
        $count = products::count();
        $pro = products::join('brands', 'products.brand_id', '=',  'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name')
            ->get();

        return view('admin/product/product', compact('pro', 'count'));
    }
    public function detail($id)
    {
        $detail_pro = products::join('brands', 'products.brand_id', '=',  'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.id', $id)
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name')
            ->get();
        return view('admin/product/show', compact('detail_pro'));
    }
    public function edit($id)
    {
        $pros = products::join('brands', 'products.brand_id', '=',  'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.id', $id)
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name')
            ->get();

        $brands = DB::table('brands')->get();
        $cats = DB::table('categories')->get();
        return view('admin/product/edit', compact('pros', 'brands', 'cats'));
    }

    public function delete(Request $req)
    {
        $product_id = $req->input('delete_product_id');
        $product = products::find($product_id);
        $product->delete();
        return redirect()->back()->with('delete-success', 'Product has been delete successfully');
    }
    public function delete_cat(Request $req)
    {
        $cat_id = $req->input('delete_category_id');
        $cat = categories::find($cat_id);
        $pro = products::where('category_id', $cat_id);
        $cat->delete();
        $pro->delete();
        return redirect()->back()->with('delete-success', 'Product has been delete successfully');
    }
}