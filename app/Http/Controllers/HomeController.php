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
use App\Models\users_has_cards;
use App\Http\Controllers\Controller;
use App\Models\se_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
// use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $count = 0;
        $second_cate = DB::table('se_categories')->limit(5)->inRandomOrder()->get();
        $cate = DB::table('categories')->limit(4)->get();
        $brand = DB::table('brands')->get();
        $data_pro = DB::table('products')->where('completed', 1)->inRandomOrder()->get();
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            return view('home/index', compact('data_user', 'data_pro', 'cate', 'brand', 'second_cate', 'count'));
        } else {
            return view('home/index', compact('data_pro', 'cate', 'brand', 'second_cate', 'count'));
        }
    }

    public function login()
    {
        return view('home/login');
    }

    public function reg()
    {
        return view('home/reg');
    }
    public function cart()
    {
        return view('home/cart');
    }

    public function detail($id)
    {
        $detail_pro = products::join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('se_categories', 'products.s_cat_id', '=', 'se_categories.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.id', $id)
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name', 'se_categories.name as se_cate')
            ->get();
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            return view('home/detailPage', compact('data_user', 'detail_pro'));
        } else {
            return view('home/detailPage', compact('detail_pro'));
        }
    }

    public function blog()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            return view('blog/blog', compact('data_seller'));
        } else {
            return view('blog/blog');
        }
    }
    public function search(Request $req)
    {
        $brand = brands::all();
        $brand_id="";
        $brandId="";
        $pro_name=$req->input('query');
        $data = products::where('name', 'like', '%' . $req->input('query') . '%')->get();
        $callinput = $req->input('query');
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
        return view('home/search', compact('data', 'pro_name','brand','data_user','brand_id','brandId'));
        }
        return view('home/search', compact('data','pro_name', 'brand','brand_id','brandId'));
    }
    public function search_filter(Request $req)
    {
        $brand = brands::all();

        $min_price = $req->min;
        $max_price = $req->max;
        $pro_name = $req->pro_name;
        $brand_id="";
        $brandId = $req->brand_id;
        if($brandId==""){
             $data = products::where('name', 'like', '%' . $pro_name . '%')->where('price', '<=' , $max_price )->where('price','>=' , $min_price)->get();
        }else{
            $data = products::where('name', 'like', '%' . $pro_name . '%')->where('price', '<=' , $max_price )->where('price','>=' , $min_price)->where('brand_id', $brandId)->get();
        }
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
        return view('home/search', compact('data','pro_name', 'brand','data_user','brand_id','brandId','max_price','min_price'));
        }
        return view('home/search', compact('data','pro_name', 'brand','brandId','max_price','brand_id','min_price'));
    }
    public function order()
    {
        return view('home/order');
    }
    public function category()
    {
        $cate = categories::all();
        return view('home/category', compact('cate'));
    }
    public function smallcate($id)
    {
        $brand = brands::all();
        $smallCateName = se_categories::find($id);
        $smallCate = DB::table('products')
            ->join('se_categories', 'products.s_cat_id', '=', 'se_categories.id')
            ->where('se_categories.id', $id)
            ->select('products.*', 'se_categories.id as sec_id')
            ->get();
        return view('home/secondaryCate', compact('smallCate', 'smallCateName', 'brand'));
    }
    public function allCategory()
    {
        $cate = categories::all();
        return view('/home/allCategory', compact('cate'));
    }
    public function brand($id)
    {
        $product = products::join('brands', 'products.brand_id', '=', 'brands.id')
            ->where('products.brand_id', $id)
            ->select('products.*', 'brands.name as brand_name')
            ->get();
        return view('home/brandlistproduct', compact('product'));
    }
}