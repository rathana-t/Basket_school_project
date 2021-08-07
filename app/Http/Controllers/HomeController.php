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
        $second_cate = DB::table('se_categories')->get();
        $cate = DB::table('categories')->limit(4)->get();
        $brand = DB::table('brands')->get();
        $recently_product = DB::table('products')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->select('products.*', 'sellers.store_name')
            ->where('completed', 1)
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();
        $data_pro = DB::table('products')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->select('products.*', 'sellers.store_name')
            ->where('completed', 1)
            ->inRandomOrder()
            ->limit(16)
            ->get();
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            return view('home/index', compact('data_user', 'data_pro', 'cate', 'brand', 'second_cate', 'count', 'recently_product'));
        } else {
            return view('home/index', compact('data_pro', 'cate', 'brand', 'second_cate', 'count', 'recently_product'));
        }
    }

    public function login()
    {
        $second_cate = DB::table('se_categories')->get();
        return view('home/login', compact('second_cate'));
    }

    public function reg()
    {
        $second_cate = DB::table('se_categories')->get();
        return view('home/reg', compact('second_cate'));
    }
    public function cart()
    {
        $second_cate = DB::table('se_categories')->get();
<<<<<<< HEAD
=======

>>>>>>> 4ffba4f44643070b94f1d4314d144bc886c29904
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            $uid = $data_user->id;

            $data_pro = carts::join('products', 'products.id', '=', 'carts.product_id')
                ->where('carts.user_id', '=', $data_user->id)
                ->select('products.*', 'carts.id as cart_id','carts.total', 'carts.quantity')->get();
            $counter = 0;
            $total_price_all_quantity = 0;
            foreach ($data_pro as $item) {
                $total_price_all_quantity = $total_price_all_quantity + $item->total;
                $counter++;
            }
<<<<<<< HEAD
            return view('home/cart', compact('data_user', 'data_pro', 'counter', 'total_price_all_quantity', 'second_cate'));
=======
            return view('home/cart', compact('data_user','second_cate', 'data_pro', 'counter', 'total_price_all_quantity'));
>>>>>>> 4ffba4f44643070b94f1d4314d144bc886c29904
        } else {
            return view('home/login', 'second_cate');
        }
    }

    public function detail($id)
    {
        $second_cate = DB::table('se_categories')->get();
        $detail_pro = products::join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('se_categories', 'products.s_cat_id', '=', 'se_categories.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.id', $id)
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name', 'se_categories.name as se_cate')
            ->get();
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            return view('home/detailPage', compact('data_user', 'detail_pro', 'second_cate'));
        } else {
            return view('home/detailPage', compact('detail_pro', 'second_cate'));
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
        $second_cate = DB::table('se_categories')->get();

        $brand = brands::all();
        $sort = "";
        $brand_id = "";
        $brandId = "";
        $min_price = "";
        $max_price = "";
        $pro_name = $req->input('query');
        $data = products::where('name', 'like', '%' . $req->input('query') . '%')->get();
        $callinput = $req->input('query');
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
            return view('home/search', compact('second_cate','data', 'sort', 'max_price', 'min_price', 'pro_name', 'brand', 'data_user', 'brand_id', 'brandId'));
        }
        return view('home/search', compact('second_cate','data', 'sort', 'max_price', 'min_price', 'pro_name', 'brand', 'brand_id', 'brandId'));
    }

    public function search_filter(Request $req)
    {
        $second_cate = DB::table('se_categories')->get();

        $brand = brands::all();

        $sort = $req->sort;
        $min_price = $req->min;
        $max_price = $req->max;
        $pro_name = $req->pro_name;
        $brand_id = "";
        $brandId = $req->brand_id;

        if ($sort == 'l_h') {
            if ($brandId == "") {
                if ($min_price == "") {
                    if ($max_price == "") {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->orderby('price', 'asc')->get();
                    } else {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('price', '<=', $max_price)->orderby('price', 'asc')->get();
                    }
                } elseif ($max_price == "") {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('price', '>=', $min_price)->orderby('price', 'asc')->get();
                } else {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('price', '<=', $max_price)->where('price', '>=', $min_price)->orderby('price', 'asc')->get();
                }
            } else {
                if ($min_price == "") {
                    if ($max_price == "") {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('brand_id', $brandId)->orderby('price', 'asc')->get();
                    } else {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('price', '<=', $max_price)->where('brand_id', $brandId)->orderby('price', 'asc')->get();
                    }
                } elseif ($max_price == "") {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('price', '>=', $min_price)->where('brand_id', $brandId)->orderby('price', 'asc')->get();
                } else {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('price', '<=', $max_price)->where('price', '>=', $min_price)->where('brand_id', $brandId)->orderby('price', 'asc')->get();
                }
            }
        } else {
            if ($brandId == "") {
                if ($min_price == "") {
                    if ($max_price == "") {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->orderby('price', 'desc')->get();
                    } else {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('price', '<=', $max_price)->orderby('price', 'desc')->get();
                    }
                } elseif ($max_price == "") {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('price', '>=', $min_price)->orderby('price', 'desc')->get();
                } else {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('price', '<=', $max_price)->where('price', '>=', $min_price)->orderby('price', 'desc')->get();
                }
            } else {
                if ($min_price == "") {
                    if ($max_price == "") {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('brand_id', $brandId)->orderby('price', 'desc')->get();
                    } else {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('price', '<=', $max_price)->where('brand_id', $brandId)->orderby('price', 'desc')->get();
                    }
                } elseif ($max_price == "") {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('price', '>=', $min_price)->where('brand_id', $brandId)->orderby('price', 'desc')->get();
                } else {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('price', '<=', $max_price)->where('price', '>=', $min_price)->where('brand_id', $brandId)->orderby('price', 'desc')->get();
                }
            }
        }

        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
            return view('home/search', compact('second_cate','data', 'pro_name', 'sort', 'brand', 'data_user', 'brand_id', 'brandId', 'max_price', 'min_price'));
        }
        return view('home/search', compact('second_cate','data', 'pro_name', 'sort', 'brand', 'brandId', 'max_price', 'brand_id', 'min_price'));
    }
    public function order()
    {
        return view('home/order');
    }
    public function category()
    {
        $second_cate = DB::table('se_categories')->get();
        $cate = categories::all();
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
            return view('home/category', compact('cate', 'data_user', 'second_cate'));
        }
        return view('home/category', compact('cate', 'second_cate'));
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

    public function brand($id)
    {
        $second_cate = DB::table('se_categories')->get();
        $product = products::join('brands', 'products.brand_id', '=', 'brands.id')
            ->where('products.brand_id', $id)
            ->select('products.*', 'brands.name as brand_name')
            ->get();
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
            return view('home/brandlistproduct', compact('data_user', 'product', 'second_cate'));
        }
        return view('home/brandlistproduct', compact('product', 'second_cate'));
    }
    public function store()
    {

        return view('home/store');
    }
    public function categoryItem($id)
    {
        $second_cate = DB::table('se_categories')->get();
        $second_cateItem = DB::table('se_categories')->where('se_categories.category_id', $id)->get();
        $cate_name = categories::find($id);
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('se_categories','se_categories.id' ,'=', 'products.s_cat_id')
            ->where('categories.id', $id)
            ->select('products.*', 'categories.name as cateName','se_categories.name as se_cate')
            ->get();
<<<<<<< HEAD
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
            return view('/home/categoryItem', compact('data_user', 'products', 'cate_name', 'second_cate', 'second_cateItem'));
        }
        return view('/home/categoryItem', compact('products', 'cate_name', 'second_cate', 'second_cateItem'));
=======
            if (session()->has('user')) {
                $data_user = users::findOrFail(session('user'));
            }
        return view('/home/categoryItem', compact('data_user','products', 'cate_name', 'second_cate'));
>>>>>>> 4ffba4f44643070b94f1d4314d144bc886c29904
    }
}