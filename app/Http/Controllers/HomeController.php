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
    public function product_search_filter(Request $req)
    {
        $result = DB::table('products')->where('completed', 1)
        ->select(DB::raw('count(count) as total_pro'), 'brand_id')
        ->groupBy('brand_id')
        ->get();
    $brand = brands::all();
    $products = DB::table('products')
        ->join('sellers', 'products.seller_id', '=', 'sellers.id')
        ->where('completed', 1)
        ->select('products.*', 'sellers.store_name')->orderByDesc('price')
        ->inRandomOrder()
        ->paginate(9);
    $productCount = DB::table('products')
        ->where('completed', 1)
        ->count();
        $brand = brands::all();

        $brand_name = $req->input('brand_name');
        // $num = 0;
        //             foreach ($brand as $item ) {
        //                 $num++;
        //                 foreach ($brand_name as $item2) {
        //                     if ($item2 == $num) {
        //                         $resultID[$num] = $item->id;
        //                     }
        //                    }
        //                 }

        $sort = $req->sort;
        $min_price = $req->min;
        $max_price = $req->max;
        $brand_id = "";

        $i = 0;
        $resultID = [];
        $products = [];

        if ($brand_name){
            $num = 0;
                foreach ($brand as $item ) {
                    $num++;
                    foreach ($brand_name as $item2) {
                        if ($item2 == $num) {
                            $i++;
                            $resultID[$i] = $item->id;
                            if ($min_price == "") {
                                if ($max_price == "") {
                                       $products[$i] = products::join('sellers', 'products.seller_id', '=', 'sellers.id')->where('products.brand_id', $item->id )->where('products.completed', 1)->orderby('products.price', $sort)->paginate(9);
                                       $products[$i]->appends($req->all());
                                    } else {
                                    $products[$i] = products::join('sellers', 'products.seller_id', '=', 'sellers.id')->where('products.brand_id', $item->id )->where('products.completed', 1)->where('products.price', '<=', $max_price)->orderby('products.price', $sort)->paginate(9);
                                    $products[$i]->appends($req->all());
                                }
                            } elseif ($max_price == "") {
                                $products[$i] = products::join('sellers', 'products.seller_id', '=', 'sellers.id')->where('products.brand_id', $item->id )->where('products.completed', 1)->where('products.price', '>=', $min_price)->orderby('products.price', $sort)->paginate(9);
                                $products[$i]->appends($req->all());
                            } else {
                                $products[$i] = products::join('sellers', 'products.seller_id', '=', 'sellers.id')->where('products.brand_id', $item->id )->where('products.completed', 1)->where('products.price', '<=', $max_price)->where('products.price', '>=', $min_price)->orderby('products.price', $sort)->paginate(9);
                                $products[$i]->appends($req->all());
                            }

                        }
                    }
                }
            }
            // if ($brand_name){
            //     $num = 0;
            //         foreach ($brand as $item ) {
            //             $num++;
            //             foreach ($brand_name as $item2) {
            //                 if ($item2 == $num) {
            //                     $i++;
            //                     $resultID[$i] = $item->id;

            //                     if ($min_price == "") {
            //                         if ($max_price == "") {
            //                                $products = products::join('sellers', 'products.seller_id', '=', 'sellers.id')->where('products.brand_id', $item->id )->where('products.completed', 1)->orderby('products.price', $sort)->paginate(9);
            //                         } else {
            //                             $products = products::join('sellers', 'products.seller_id', '=', 'sellers.id')->where('products.brand_id', $item->id )->where('products.completed', 1)->where('products.price', '<=', $max_price)->orderby('products.price', $sort)->paginate(9);
            //                         }
            //                     } elseif ($max_price == "") {
            //                         $products = products::join('sellers', 'products.seller_id', '=', 'sellers.id')->where('products.brand_id', $item->id )->where('products.completed', 1)->where('products.price', '>=', $min_price)->orderby('products.price', $sort)->paginate(9);
            //                     } else {
            //                         $products = products::join('sellers', 'products.seller_id', '=', 'sellers.id')->where('products.brand_id', $item->id )->where('products.completed', 1)->where('products.price', '<=', $max_price)->where('products.price', '>=', $min_price)->orderby('products.price', $sort)->paginate(9);
            //                     }

            //                 }
            //             }
            //         }
            //     }


    if (session()->has('user')) {
        $data_user = Users::findOrFail(session('user'));
        return view('home/products', compact('data_user','brand_name','sort','i','resultID','max_price','min_price', 'products', 'productCount', 'brand', 'result'));
    }
    return view('home/products', compact('products','brand_name','i','sort','resultID','max_price','min_price', 'productCount', 'brand', 'result'));

    }
    static public function countCart()
    {
        $data_user = Users::findOrFail(session('user'));
        return  carts::join('products', 'products.id', '=', 'carts.product_id')
            ->where('carts.user_id', '=', $data_user->id)
            ->where('carts.in_order', 0)
            ->count();
    }
    static public function countWishlist()
    {
        $data_user = Users::findOrFail(session('user'));
        return products::join('wishlist', 'wishlist.pro_id', '=', 'products.id')
            ->where('wishlist.u_id', $data_user->id)
            ->select('products.*', 'wishlist.id as wish_id')
            ->count();
    }
    static public function secondCat()
    {
        return DB::table('se_categories')->get();
    }
    public function index()
    {
        $count = 0;
        $topSale = DB::table('products')
            ->orderByDesc('top_buy')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('completed', 1)
            ->select('products.*', 'sellers.store_name')
            ->limit(3)
            ->get();
        $second_cate = DB::table('se_categories')
            ->limit(8)
            ->get();
        $randSecond_cate = DB::table('se_categories')
            ->limit(6)
            ->inRandomOrder()
            ->get();
        $cate = DB::table('categories')->limit(4)->get();
        $brand = DB::table('brands')->limit(6)->get();
        $result = DB::table('products')
            ->select(DB::raw('count(count) as total_pro'), 'brand_id')
            ->groupBy('brand_id')
            ->get();
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
            ->limit(8)
            ->get();
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            return view('home/index', compact('data_user', 'result', 'data_pro', 'cate', 'brand', 'second_cate', 'count', 'recently_product', 'randSecond_cate', 'topSale'));
        } else {
            return view('home/index', compact('data_pro', 'result', 'cate', 'brand', 'second_cate', 'count', 'recently_product', 'randSecond_cate', 'topSale'));
        }
    }
    public function products()
    {
        $result = DB::table('products')->where('completed', 1)
            ->select(DB::raw('count(count) as total_pro'), 'brand_id')
            ->groupBy('brand_id')
            ->get();
        $brand = brands::all();
        $products = DB::table('products')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('completed', 1)
            ->select('products.*', 'sellers.store_name')->orderByDesc('price')
            ->inRandomOrder()
            ->paginate(9);
        $productCount = DB::table('products')
            ->where('completed', 1)
            ->count();
            $min_price ='';
            $max_price ='';
            $i = 0;
        $resultID = [];
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            return view('home/products', compact('data_user','resultID','i','min_price','max_price', 'products', 'productCount', 'brand', 'result'));
        }
        return view('home/products', compact('products','min_price','max_price', 'productCount', 'brand', 'result'));
    }
    public function login()
    {
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            if ($data_user->type == "admin") {
                return redirect('/admin');
            }
        }
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
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            $uid = $data_user->id;

            $data_pro = carts::join('products', 'products.id', '=', 'carts.product_id')
                ->where('carts.user_id', '=', $data_user->id)
                ->where('carts.in_order', 0)
                ->select('products.*', 'carts.id as cart_id', 'carts.total', 'carts.quantity')->orderByDesc('carts.updated_at')->get();
            $counter = 0;
            $quantity = 0;
            $total_price_all_quantity = 0;
            foreach ($data_pro as $item) {
                $total_price_all_quantity = $total_price_all_quantity + $item->total;
                $quantity =  $quantity + $item->quantity;
                $counter++;
            }
            return view('home/cart', compact('quantity', 'data_user', 'second_cate', 'data_pro', 'counter', 'total_price_all_quantity'));
        } else {
            return view('home/login', 'second_cate');
        }
    }

    public function detail($id)
    {
        $product_id = products::find($id);
        $second_cate = DB::table('se_categories')->get();
        $detail_pro = products::join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('se_categories', 'products.s_cat_id', '=', 'se_categories.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.id', $id)
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name', 'se_categories.name as se_cate')
            ->get();
        $related_pro = products::where('category_id', $product_id->category_id)
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->select('products.*', 'sellers.store_name')
            ->where('completed', 1)
            ->get();
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            return view('home/detailPage', compact('data_user', 'detail_pro', 'related_pro', 'second_cate', 'product_id'));
        } else {
            return view('home/detailPage', compact('detail_pro', 'second_cate', 'related_pro', 'product_id'));
        }
    }

    public function detail2($id2, $id)
    {
        $categoryId = categories::find($id2);
        $product_id = products::find($id);
        $second_cate = DB::table('se_categories')->get();
        $detail_pro = products::join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('se_categories', 'products.s_cat_id', '=', 'se_categories.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.id', $id)
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name', 'se_categories.name as se_cate')
            ->get();
        $related_pro = products::where('category_id', $product_id->category_id)
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->select('products.*', 'sellers.store_name')
            ->where('completed', 1)->get();

        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            return view('home/detailPage', compact('data_user', 'related_pro', 'detail_pro', 'second_cate', 'product_id', 'categoryId'));
        } else {
            return view('home/detailPage', compact('detail_pro', 'related_pro', 'second_cate', 'product_id', 'categoryId'));
        }
    }

    public function detail3($id, $id1)
    {
        $smallCate = se_categories::find($id);
        $product_id = products::find($id1);
        $second_cate = DB::table('se_categories')->get();
        $detail_pro = products::join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('se_categories', 'products.s_cat_id', '=', 'se_categories.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.id', $id1)
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name', 'se_categories.name as se_cate')
            ->get();
        $related_pro = products::where('category_id', $product_id->category_id)
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->select('products.*', 'sellers.store_name')
            ->where('completed', 1)
            ->get();
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            return view('home/detailPage', compact('data_user', 'related_pro', 'detail_pro', 'second_cate', 'product_id', 'smallCate'));
        } else {
            return view('home/detailPage', compact('detail_pro', 'related_pro', 'second_cate', 'product_id', 'smallCate'));
        }
    }
    public function detail4($id, $id1)
    {
        $brand = brands::find($id);
        $product_id = products::find($id1);
        $second_cate = DB::table('se_categories')->get();
        $detail_pro = products::join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('se_categories', 'products.s_cat_id', '=', 'se_categories.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.id', $id1)
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name', 'se_categories.name as se_cate')
            ->get();
        $related_pro = products::where('category_id', $product_id->category_id)
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->select('products.*', 'sellers.store_name')
            ->where('completed', 1)
            ->get();

        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            return view('home/detailPage', compact('data_user', 'related_pro', 'detail_pro', 'second_cate', 'product_id', 'brand'));
        } else {
            return view('home/detailPage', compact('detail_pro', 'related_pro', 'second_cate', 'product_id', 'brand'));
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
        $data = products::where('name', 'like', '%' . $req->input('query') . '%')->where('completed', 1)->orderByDesc('price')->paginate(6);
        $callinput = $req->input('query');
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
            return view('home/search', compact('second_cate', 'data', 'sort', 'max_price', 'min_price', 'pro_name', 'brand', 'data_user', 'brand_id', 'brandId'));
        }
        return view('home/search', compact('second_cate', 'data', 'sort', 'max_price', 'min_price', 'pro_name', 'brand', 'brand_id', 'brandId'));
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
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->orderby('price', 'asc')->paginate(6);
                    } else {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->where('price', '<=', $max_price)->orderby('price', 'asc')->paginate(6);
                    }
                } elseif ($max_price == "") {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->where('price', '>=', $min_price)->orderby('price', 'asc')->paginate(6);
                } else {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->where('price', '<=', $max_price)->where('price', '>=', $min_price)->orderby('price', 'asc')->paginate(6);
                }
            } else {
                if ($min_price == "") {
                    if ($max_price == "") {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->where('brand_id', $brandId)->orderby('price', 'asc')->paginate(6);
                    } else {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->where('price', '<=', $max_price)->where('brand_id', $brandId)->orderby('price', 'asc')->paginate(6);
                    }
                } elseif ($max_price == "") {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->where('price', '>=', $min_price)->where('brand_id', $brandId)->orderby('price', 'asc')->paginate(6);
                } else {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->where('price', '<=', $max_price)->where('price', '>=', $min_price)->where('brand_id', $brandId)->orderby('price', 'asc')->paginate(6);
                }
            }
        } else {
            if ($brandId == "") {
                if ($min_price == "") {
                    if ($max_price == "") {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->orderby('price', 'desc')->paginate(6);
                    } else {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->where('price', '<=', $max_price)->orderby('price', 'desc')->paginate(6);
                    }
                } elseif ($max_price == "") {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->where('price', '>=', $min_price)->orderby('price', 'desc')->paginate(6);
                } else {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->where('price', '<=', $max_price)->where('price', '>=', $min_price)->orderby('price', 'desc')->paginate(6);
                }
            } else {
                if ($min_price == "") {
                    if ($max_price == "") {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->where('brand_id', $brandId)->orderby('price', 'desc')->paginate(6);
                    } else {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->where('price', '<=', $max_price)->where('brand_id', $brandId)->orderby('price', 'desc')->paginate(6);
                    }
                } elseif ($max_price == "") {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->where('price', '>=', $min_price)->where('brand_id', $brandId)->orderby('price', 'desc')->paginate(6);
                } else {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('completed', 1)->where('price', '<=', $max_price)->where('price', '>=', $min_price)->where('brand_id', $brandId)->orderby('price', 'desc')->paginate(6);
                }
            }
        }
        $data->appends($req->all());
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
            return view('home/search', compact('second_cate', 'data', 'pro_name', 'sort', 'brand', 'data_user', 'brand_id', 'brandId', 'max_price', 'min_price'));
        }
        return view('home/search', compact('second_cate', 'data', 'pro_name', 'sort', 'brand', 'brandId', 'max_price', 'brand_id', 'min_price'));
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

    public function smallcate()
    {
        $second_cate = DB::table('se_categories')->get();
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
            return view('home/secondaryCate', compact('second_cate', 'data_user'));
        }
        return view('home/secondaryCate', compact('second_cate'));
    }

    public function smallcateItem($id)
    {
        $second_cate = DB::table('se_categories')->get();
        $smallCateName = se_categories::find($id);
        $products = DB::table('products')
            ->join('se_categories', 'products.s_cat_id', '=', 'se_categories.id')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('se_categories.id', $id)
            ->where('completed', 1)
            ->select('products.*', 'se_categories.id as sec_id', 'sellers.store_name')
            ->get();
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
            return view('home/secondaryCateItem', compact('products', 'smallCateName', 'second_cate', 'data_user'));
        }
        return view('home/secondaryCateItem', compact('products', 'smallCateName', 'second_cate'));
    }

    public function allBrand()
    {
        $second_cate = DB::table('se_categories')->get();
        $result = DB::table('products')
            ->select(DB::raw('count(count) as total_pro'), 'brand_id')
            ->groupBy('brand_id')
            ->get();
        $brands = DB::table('brands')->get();
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
            return view('/home/allBrands', compact('brands', 'result', 'second_cate', 'data_user'));
        }
        return view('/home/allBrands', compact('brands', 'result', 'second_cate'));
    }
    public function brand($id)
    {
        $brand_id = brands::find($id);
        $second_cate = DB::table('se_categories')->get();
        $product = products::join('brands', 'products.brand_id', '=', 'brands.id')
            ->where('products.brand_id', $id)
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->select('products.*', 'brands.name as brand_name', 'sellers.store_name')
            ->get();
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
            return view('home/brandlistproduct', compact('data_user', 'product', 'second_cate', 'brand_id'));
        }
        return view('home/brandlistproduct', compact('product', 'second_cate', 'brand_id'));
    }
    public function store($id)
    {
        $countProduct = DB::table('products')
            ->where('completed', 1)
            ->where('seller_id', $id)
            ->count();
        $store = sellers::find($id);
        $product = DB::table('products')
            ->where('completed', 1)
            ->where('seller_id', $id)
            ->get();
        $second_cate = DB::table('se_categories')->get();
        return view('home/store', compact('second_cate', 'product', 'store', 'countProduct'));
    }
    public function categoryItem($id)
    {
        $second_cate = DB::table('se_categories')->get();
        $second_cateItem = DB::table('se_categories')->where('se_categories.category_id', $id)->get();
        $cate_name = categories::find($id);
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('se_categories', 'se_categories.id', '=', 'products.s_cat_id')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('categories.id', $id)
            ->where('completed', 1)
            ->select('products.*', 'categories.name as cateName', 'se_categories.name as se_cate', 'sellers.store_name')
            ->get();
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
            return view('/home/categoryItem', compact('data_user', 'products', 'second_cateItem', 'cate_name', 'second_cate'));
        }
        return view('/home/categoryItem', compact('products', 'second_cateItem', 'cate_name', 'second_cate'));
    }
}