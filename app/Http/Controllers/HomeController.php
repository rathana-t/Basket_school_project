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
        $second_cate = DB::table('se_categories')->limit(5)->inRandomOrder()->get();
        $cate = DB::table('categories')->limit(4)->get();
        $brand = DB::table('brands')->get();
        $data_pro = DB::table('products')->get();
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            return view('home/index', compact('data_user', 'data_pro', 'cate', 'brand', 'second_cate'));
        } else {
            return view('home/index', compact('data_pro', 'cate', 'brand', 'second_cate'));
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
        $detail_pro = products::join(
            'brands',
            'products.brand_id',
            '=',
            'brands.id'
        )->join(
            'categories',
            'products.category_id',
            '=',
            'categories.id'
        )->where(
            'products.id',
            $id
        )->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name')->get();

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
        $data = products::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return view('home/search');
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
}