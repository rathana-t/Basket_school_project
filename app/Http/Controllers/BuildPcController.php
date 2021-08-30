<?php

namespace App\Http\Controllers;
use App\Models\carts;
use App\Models\users;
use App\Models\brands;
use App\Models\BuildPC;
use App\Models\products;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\se_categories;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BuildPcController extends Controller
{
    public function search(Request $req){
        $second_cate = DB::table('se_categories')->get();

        $brand = brands::all();
        $s_cate_id = $req->s_cate_id;
        $A_U = $req->A_U;
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
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->orderby('price', 'asc')->paginate(5);
                    } else {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->where('price', '<=', $max_price)->orderby('price', 'asc')->paginate(5);
                    }
                } elseif ($max_price == "") {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->where('price', '>=', $min_price)->orderby('price', 'asc')->paginate(5);
                } else {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->where('price', '<=', $max_price)->where('price', '>=', $min_price)->orderby('price', 'asc')->paginate(5);
                }
            } else {
                if ($min_price == "") {
                    if ($max_price == "") {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->where('brand_id', $brandId)->orderby('price', 'asc')->paginate(5);
                    } else {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->where('price', '<=', $max_price)->where('brand_id', $brandId)->orderby('price', 'asc')->paginate(5);
                    }
                } elseif ($max_price == "") {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->where('price', '>=', $min_price)->where('brand_id', $brandId)->orderby('price', 'asc')->paginate(5);
                } else {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->where('price', '<=', $max_price)->where('price', '>=', $min_price)->where('brand_id', $brandId)->orderby('price', 'asc')->paginate(5);
                }
            }
        } else {
            if ($brandId == "") {
                if ($min_price == "") {
                    if ($max_price == "") {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->orderby('price', 'desc')->paginate(5);
                    } else {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->where('price', '<=', $max_price)->orderby('price', 'desc')->paginate(5);
                    }
                } elseif ($max_price == "") {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->where('price', '>=', $min_price)->orderby('price', 'desc')->paginate(5);
                } else {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->where('price', '<=', $max_price)->where('price', '>=', $min_price)->orderby('price', 'desc')->paginate(5);
                }
            } else {
                if ($min_price == "") {
                    if ($max_price == "") {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->where('brand_id', $brandId)->orderby('price', 'desc')->paginate(5);
                    } else {
                        $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->where('price', '<=', $max_price)->where('brand_id', $brandId)->orderby('price', 'desc')->paginate(5);
                    }
                } elseif ($max_price == "") {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->where('price', '>=', $min_price)->where('brand_id', $brandId)->orderby('price', 'desc')->paginate(5);
                } else {
                    $data = products::where('name', 'like', '%' . $pro_name . '%')->where('s_cat_id', $s_cate_id)->where('price', '<=', $max_price)->where('price', '>=', $min_price)->where('brand_id', $brandId)->orderby('price', 'desc')->paginate(5);
                }
            }
        }
        $data->appends($req->all());
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));
            return view('home/buildPC/product', compact('second_cate','s_cate_id','A_U', 'data', 'pro_name', 'sort', 'brand', 'data_user', 'brand_id', 'brandId', 'max_price', 'min_price'));
        }

    }
    public function add_to_cart(){
        $data_user = users::findOrFail(session('user'));

        $data_pro = BuildPC::join('products', 'products.id', '=', 'buildpc.product_id')
        ->where('buildpc.user_id','=',$data_user->id)
        ->select('products.*')->get();

        $allcart = carts::all();
        foreach($data_pro as $pro){
        $check = 0;
            foreach ($allcart as $cart) {
                if ($cart->user_id ==  $data_user->id && $pro->id == $cart->product_id && $cart->in_order == 0) {
                    $cart->quantity = $cart->quantity +  1;
                    $cart->total = $cart->quantity * $pro->price;
                    $cart->update();
                    $check++;
                }
            }
            if ($check == 0) {
                $newcart = new carts();

                $newcart->quantity = 1;
                $newcart->total = $pro->price * 1;
                $newcart->user_id = $data_user->id;
                $newcart->product_id = $pro->id;

                $newcart->save();
            }
        }
        foreach($data_pro as $pro){
            $buildPC = BuildPC::where('user_id',$data_user->id)->first();
            $buildPC->delete();
        }
        return redirect()->back()->with('add-to-cart-success', 'Added to cart');
    }
    public function remove($id){
        $Buildpc = BuildPC::where('s_cate_id',$id)->first();

        $Buildpc->delete();
        return redirect()->back();
    }
    public function select_item($id,$seond,$A_U){
        $data_user = users::findOrFail(session('user'));
        if($A_U==0){
            $Buildpc = new BuildPC();
            $Buildpc->user_id = $data_user->id;
            $Buildpc->s_cate_id = $seond;
            $Buildpc->product_id = $id;
            $Buildpc->save();
        }elseif($A_U==1){
            $Buildpc = BuildPC::where('s_cate_id',$seond)->where('user_id',$data_user->id)->first();
            $Buildpc->product_id = $id;
            $Buildpc->update();
        }
        return redirect(route('build_pc'));
    }
    public function go_away(Request $req){
        if($req->A_U == '' || $req->s_cate_id ==''){
            return redirect('/');
        }
    }

    public function get_item_by_se_cate(Request $req){

        $A_U = $req->A_U;
            $second_cate = DB::table('se_categories')->get();
            $s_cate_id = $req->s_cate_id;
            $brand = brands::all();
            $data = products::where('s_cat_id',$s_cate_id)->orderByDesc('price')
            ->paginate(5);
            $sort = "";
            $brand_id = "";
            $brandId = "";
            $min_price = "";
            $max_price = "";
            $pro_name = '';
            $callinput = '';
            if (session()->has('user')) {
                $data_user = users::findOrFail(session('user'));
                return view('home/buildPC/product', compact('second_cate','s_cate_id','A_U', 'data', 'sort', 'max_price', 'min_price', 'pro_name', 'brand', 'data_user', 'brand_id', 'brandId'));
            }
            return view('home/search', compact('second_cate', 'data', 's_cate_id','sort', 'max_price', 'min_price', 'pro_name', 'brand', 'brand_id', 'brandId'));

    }
    public function build_pc()
    {
        $category = DB::table('categories')->where('id',1)->get();
        $second_cate = DB::table('se_categories')->where('category_id',1)->get();
        $data_user = Users::findOrFail(session('user'));
        $buildPC = BuildPC::where('user_id',$data_user->id)->get();
            $uid = $data_user->id;


            $data_pro = BuildPC::join('products', 'products.id', '=', 'buildpc.product_id')
                ->join('sellers', 'products.seller_id', '=', 'sellers.id')
                ->where('buildpc.user_id','=',$data_user->id)
                ->select('products.*')->get();

            $counter = 0;
            $quantity = 0;
            $total_price_all_quantity = 0;
            foreach ($data_pro as $item) {
                $total_price_all_quantity = $total_price_all_quantity + $item->price;
                $quantity++;
                $counter++;
            }


            return view('home/buildPC/buildPC', compact('buildPC','quantity','category','data_user', 'second_cate', 'data_pro', 'counter', 'total_price_all_quantity'));
    }
}
