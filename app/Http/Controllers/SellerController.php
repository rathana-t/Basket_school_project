<?php

namespace App\Http\Controllers;

use App\Models\cards;
use App\Models\carts;
use App\Models\users;
use App\Models\brands;
use App\Models\orders;
use App\Models\Report;
use App\Helpers\Helper;
use App\Models\sellers;
use App\Models\messages;
use App\Models\products;
use App\Models\receipts;
use App\Models\categories;
use App\Models\Commission;
use Illuminate\Http\Request;
use App\Models\se_categories;
use App\Models\users_has_cards;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Psy\CodeCleaner\FinalClassPass;

// use Symfony\Component\HttpFoundation\Session\Session;

class SellerController extends Controller
{
    public function test()
    {

        $data_seller = sellers::findOrFail(session('seller'));
        $report = Report::where('seller_id',$data_seller->id)->get();
        // $product = DB::table('orders')
        //     ->join('carts', 'orders.cart_id', 'carts.id')
        //     ->join('products', 'products.id', 'carts.product_id')
        //     ->where('products.seller_id', $data_seller->id)
        //     ->where('orders.delivery', 1)
        //     ->select('products.*', 'carts.quantity')
        //     ->get();
        // dd($product);
        return view('/seller/test', compact('data_seller', 'report'));
    }
    public function dashboard()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            $sumOrderTotal = $sumOrderTotal = DB::table('orders')
                ->join('carts', 'orders.cart_id', 'carts.id')
                ->join('products', 'products.id', 'carts.product_id')
                ->where('products.seller_id', $data_seller->id)
                ->select('orders.*', 'carts.total')
                ->sum('carts.total');
            $countOrderTotal = DB::table('orders')
                ->join('carts', 'orders.cart_id', 'carts.id')
                ->join('products', 'products.id', 'carts.product_id')
                ->where('products.seller_id', $data_seller->id)
                ->select('orders.*', 'carts.total')
                ->count();
            $countItemTotal = DB::table('orders')
                ->join('carts', 'orders.cart_id', 'carts.id')
                ->join('products', 'products.id', 'carts.product_id')
                ->where('products.seller_id', $data_seller->id)
                ->select('orders.*', 'carts.quantity')
                ->sum('carts.quantity');
            $sumOrderPending = DB::table('orders')
                ->join('carts', 'orders.cart_id', 'carts.id')
                ->join('products', 'products.id', 'carts.product_id')
                ->where('orders.pending', 1)
                ->where('products.seller_id', $data_seller->id)
                ->select('orders.*', 'carts.total')
                ->sum('carts.total');
            $countOrderPending = DB::table('orders')
                ->join('carts', 'orders.cart_id', 'carts.id')
                ->join('products', 'products.id', 'carts.product_id')
                ->where('orders.pending', 1)
                ->where('products.seller_id', $data_seller->id)
                ->select('orders.*', 'carts.total')
                ->count();
            $countItemPending = DB::table('orders')
                ->join('carts', 'orders.cart_id', 'carts.id')
                ->join('products', 'products.id', 'carts.product_id')
                ->where('orders.pending', 1)
                ->where('products.seller_id', $data_seller->id)
                ->select('orders.*', 'carts.quantity')
                ->sum('carts.quantity');
            $sumOrderProcess = DB::table('orders')
                ->join('carts', 'orders.cart_id', 'carts.id')
                ->join('products', 'products.id', 'carts.product_id')
                ->where('orders.processing', 1)
                ->where('products.seller_id', $data_seller->id)
                ->select('orders.*', 'carts.total')
                ->sum('carts.total');
            $countOrderProcess = DB::table('orders')
                ->join('carts', 'orders.cart_id', 'carts.id')
                ->join('products', 'products.id', 'carts.product_id')
                ->where('orders.processing', 1)
                ->where('products.seller_id', $data_seller->id)
                ->select('orders.*', 'carts.total')
                ->count();
            $countItemProcess = DB::table('orders')
                ->join('carts', 'orders.cart_id', 'carts.id')
                ->join('products', 'products.id', 'carts.product_id')
                ->where('orders.processing', 1)
                ->where('products.seller_id', $data_seller->id)
                ->select('orders.*', 'carts.quantity')
                ->sum('carts.quantity');
            $sumOrderHistory = DB::table('orders')
                ->join('carts', 'orders.cart_id', 'carts.id')
                ->join('products', 'products.id', 'carts.product_id')
                ->where('orders.delivery', 1)
                ->where('products.seller_id', $data_seller->id)
                ->select('orders.*', 'carts.total')
                ->sum('carts.total');
            $countOrderHistory = DB::table('orders')
                ->join('carts', 'orders.cart_id', 'carts.id')
                ->join('products', 'products.id', 'carts.product_id')
                ->where('orders.delivery', 1)
                ->where('products.seller_id', $data_seller->id)
                ->select('orders.*', 'carts.total')
                ->count();
            $countItemHistory = DB::table('orders')
                ->join('carts', 'orders.cart_id', 'carts.id')
                ->join('products', 'products.id', 'carts.product_id')
                ->where('orders.delivery', 1)
                ->where('products.seller_id', $data_seller->id)
                ->select('orders.*', 'carts.quantity')
                ->sum('carts.quantity');
            return view('seller/dashboard', compact(
                'data_seller',
                'sumOrderTotal',
                'countOrderTotal',
                'countItemTotal',
                'sumOrderPending',
                'countOrderPending',
                'countItemPending',
                'sumOrderProcess',
                'countOrderProcess',
                'countItemProcess',
                'sumOrderHistory',
                'countOrderHistory',
                'countItemHistory'
            ));
        } else {
            return view('seller/dashboard');
        }
    }
    public function delete_user_cancel_order($id)
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            $data = orders::find($id);

            $data->delete();

            return redirect()->back();
        }
    }
    public function remove_old_order($id)
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            $data = orders::find($id);
            $data->seller_remove_cancel = 1;

            $data->update();

            return redirect()->back();
        }
    }

    public function remove_cancel($id)
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            $data = orders::find($id);
            $data->seller_remove_cancel = 1;

            $data->update();

            return redirect()->back();
        }
    }
    public function login_page()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            return view('seller/profile', compact('data_seller'));
        } else {
            return view('seller/login');
        }
    }
    public function login(Request $req)
    {
        $email_phone = request()->input('email_phone');

        if (is_numeric($email_phone)) {
            $data = request()->validate([
                'email_phone' => 'required',
                'password' => 'required',
            ]);
            $seller = DB::table('sellers')->where("phone", "=", $data["email_phone"])->where("pending", "1")->first();
            if ($seller) {
                $validPassword = Hash::check($data['password'], $seller->password);
                if ($validPassword) {
                    session()->put('seller', $seller->id);
                    if ($req->has('remeberme')) {
                        Cookie::queue(cookie()->forever('sellerPhone', $seller->phone));
                        Cookie::queue(cookie()->forever('sellerPass', $req->password));
                        // Cookie::queue('sellerPhone', $seller->phone, 1440);
                        Cookie::queue(Cookie::forget('sellerEmail'));
                        // Cookie::queue('sellerPass', $req->password, 1440);
                    } else {
                        Cookie::queue(Cookie::forget('sellerEmail'));
                        Cookie::queue(Cookie::forget('sellerPhone'));
                        Cookie::queue(Cookie::forget('sellerPass'));
                    }
                    return redirect('/blog')->with('success', "Successfully Login!");
                }
                return redirect()->back()->with("fail", "Incorrect Email/Phone Number or password!")->withInput();
            }
        } elseif (filter_var($email_phone, FILTER_VALIDATE_EMAIL)) {
            $data = request()->validate([
                'email_phone' => 'required',
                'password' => 'required',
            ]);
            $seller = DB::table('sellers')->where("email", "=", $data["email_phone"])->where("pending", "1")->first();
            if ($seller) {
                $validPassword = Hash::check($data['password'], $seller->password);
                if ($validPassword) {
                    session()->put('seller', $seller->id);
                    if ($req->has('remeberme')) {
                        Cookie::queue(cookie()->forever('sellerEmail', $seller->email));
                        Cookie::queue(cookie()->forever('sellerPass', $req->password));
                        // Cookie::queue('sellerEmail', $seller->email, 1440);
                        Cookie::queue(Cookie::forget('sellerPhone'));
                        // Cookie::queue('sellerPass', $req->password, 1440);
                    } else {
                        Cookie::queue(Cookie::forget('sellerPhone'));
                        Cookie::queue(Cookie::forget('sellerEmail'));
                        Cookie::queue(Cookie::forget('sellerPass'));
                    }
                    return redirect('/blog')->with('success', "Successfully Login!");
                }
                return redirect()->back()->with("fail", "Incorrect Email/Phone Number or password!")->withInput();
            }
        }

        return redirect()->back()->with("fail", "Incorrect Email/Phone Number or password!")->withInput();
    }

    public function register(Request $reg)
    {
        $data = request()->validate([
            'store_name' => 'required',
            // 'term_condition' => 'required',
            'email' => 'required|email|max:70|unique:sellers,email',
            'phone' => 'required|min:9|unique:sellers,phone',
            'address' => 'required',
            'province_id' => 'required',
            'img2' => 'required',
            'img1' => 'required',
            'password' => 'required|min:8',
            'con_password' => 'required|min:8|same:password',
        ]);

        $data['password'] = Hash::make($data['password']);
        unset($data['con_password']);

        if ($reg->hasfile('img1')) {
            $file = $reg->file('img1');
            $filename = uniqid() . $file->getClientOriginalExtension();
            $file->move(public_path() . '/images/sellerImg1/', $filename);
            $data['img1'] = $filename;
        }
        if ($reg->hasfile('img2')) {
            $file = $reg->file('img2');
            $filename = uniqid() . $file->getClientOriginalExtension();
            $file->move(public_path() . '/images/sellerImg2/', $filename);
            $data['img2'] = $filename;
        }

        sellers::create($data);

        return redirect()->back()->with('success_regiter_seller', 'Request register seller account Successfully, please wait until we send message to you by email');
    }
    public function forseller()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            return view('blog/blog', compact('data_seller'));
        } else {
            return view('blog/blog');
        }
    }
    public function register_page()
    {
        $provinces = Province::all();
        return view('seller/register',compact('provinces'));
    }

    public function products()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
        }
        $id = $data_seller->id;
        $main_cate = categories::get();
        $count_pro =  $sellerHasProduct = DB::table('products')
        ->join('sellers', 'products.seller_id', '=', 'sellers.id')
        ->where('products.stock', '>' ,0)
        ->where('sellers.id', $id)->count();
        $count_pro_out =  $sellerHasProduct = DB::table('products')
        ->join('sellers', 'products.seller_id', '=', 'sellers.id')
        ->where('products.stock', '<=' ,0)
        ->where('sellers.id', $id)->count();
        $sellerHasProduct = DB::table('products')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('sellers.id', $id)
            ->where('products.stock', '>' ,0)
            // ->where('products.completed', '=', '1')
            ->select('products.*', 'sellers.store_name', 'sellers.phone', 'sellers.address')
            ->orderByDesc('updated_at')
            ->paginate(5);
        $data_seller = sellers::find($id);

        $i = 0;
        return view('seller/product/listProduct', compact('i', 'count_pro','data_seller','count_pro_out', 'sellerHasProduct', 'main_cate'));
    }
    public function products_out_stock(){
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
        }
        $id = $data_seller->id;
        $main_cate = categories::get();
        $count_pro_out =  $sellerHasProduct = DB::table('products')
        ->join('sellers', 'products.seller_id', '=', 'sellers.id')
        ->where('products.stock', '<=' ,0)
        ->where('sellers.id', $id)->count();
        $count_pro =  $sellerHasProduct = DB::table('products')
        ->join('sellers', 'products.seller_id', '=', 'sellers.id')
        ->where('products.stock', '>' ,0)
        ->where('sellers.id', $id)->count();
        $sellerHasProduct = DB::table('products')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('sellers.id', $id)
            ->where('products.stock', '<=' ,0)
            // ->where('products.completed', '=', '1')
            ->select('products.*', 'sellers.store_name', 'sellers.phone', 'sellers.address')
            ->orderByDesc('updated_at')
            ->paginate(5);
        $data_seller = sellers::find($id);

        $i = 0;
        return view('seller/product/listProduct_out_stock', compact('i', 'count_pro','data_seller','count_pro_out', 'sellerHasProduct', 'main_cate'));
    }
    // public function productPending()
    // {
    //     if (session()->has('seller')) {
    //         $data_seller = sellers::findOrFail(session('seller'));
    //     }
    //     $id = $data_seller->id;
    //     $main_cate = categories::get();
    //     $sellerHasProduct = DB::table('products')
    //         ->join('sellers', 'products.seller_id', '=', 'sellers.id')
    //         ->where('sellers.id', $id)
    //         ->where('products.completed', '=', '0')
    //         ->select('products.*', 'sellers.store_name', 'sellers.phone', 'sellers.address')
    //         ->orderBy('updated_at', 'desc')
    //         ->paginate(5);
    //     $data_seller = sellers::find($id);

    //     $i = 0;
    //     return view('seller/product/listProductPending', compact('i', 'data_seller', 'sellerHasProduct', 'main_cate'));
    // }
    public function choose_main_cate()
    {
        $main_cate = categories::get();
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            $count_pro_out =  $sellerHasProduct = DB::table('products')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('products.stock', '<=' ,0)
            ->where('sellers.id', $data_seller->id)->count();
            $count_pro =  $sellerHasProduct = DB::table('products')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('sellers.id', $data_seller->id)
            ->where('products.stock', '>' ,0)
            ->count();
            return view('seller/product/main_cate', compact('data_seller','count_pro','count_pro_out', 'main_cate'));
        } else {
            return view('seller/login');
        }
    }

    public function new_order()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            $data = orders::join('carts', 'carts.id', '=', 'orders.cart_id')
                ->join('users', 'users.id', '=', 'carts.user_id')
                ->join('products', 'products.id', '=', 'carts.product_id')
                ->where('products.seller_id', $data_seller->id)
                ->where('orders.pending', 1)
                ->where('orders.user_cancel',0)
                ->where('orders.seller_cancel',0)
                ->select('products.*', 'carts.total', 'orders.seller_cancel', 'orders.pending', 'orders.user_cancel', 'orders.id as order_id', 'carts.quantity', 'users.username as u_name', 'users.phone as u_phone', 'users.address as u_address')
                ->orderBy('orders.updated_at', 'desc')
                ->paginate(5);
            return view('seller/new_order', compact('data_seller', 'data'));
        } else {
            return view('seller/login');
        }
    }
    public function con_pending(Request $req)
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));

            $data = orders::find($req->order_id);
            $data->pending = 0;
            $data->processing_message = $req->message;
            $data->processing = 1;
            $data->update();
            return redirect()->back();
        }
    }
    public function order_paid(){
        $data_seller = sellers::findOrFail(session('seller'));
        $pro_alread_paid = orders::join('carts', 'carts.id', '=', 'orders.cart_id')
        ->join('users', 'users.id', '=', 'carts.user_id')
        ->join('products', 'products.id', '=', 'carts.product_id')
        ->where('products.seller_id', $data_seller->id)
        ->where('orders.use_payment_method', 1)
        ->select('products.*', 'carts.total', 'orders.seller_cancel', 'orders.user_cancel', 'orders.processing', 'carts.quantity', 'orders.id as order_id', 'users.username as u_name', 'users.phone as u_phone', 'users.address as u_address')
        ->orderBy('orders.updated_at', 'desc')
        ->paginate(5);

            return view('seller/order_paid', compact('data_seller','pro_alread_paid'));

    }
    public function order_processing()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            $data = orders::join('carts', 'carts.id', '=', 'orders.cart_id')
                ->join('users', 'users.id', '=', 'carts.user_id')
                ->join('products', 'products.id', '=', 'carts.product_id')
                ->where('products.seller_id', $data_seller->id)
                ->where('orders.processing', 1)
                ->where('orders.user_cancel',0)
                ->where('orders.seller_cancel',0)
                ->select('products.*', 'carts.total', 'orders.seller_cancel', 'orders.user_cancel', 'orders.processing', 'carts.quantity', 'orders.id as order_id', 'users.username as u_name', 'users.phone as u_phone', 'users.address as u_address')
                ->orderBy('orders.updated_at', 'desc')
                ->paginate(5);

            return view('seller/processing', compact('data_seller', 'data'));
        } else {
            return view('seller/login');
        }
    }

    public function con_processing(Request $req)
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            $data = orders::find($req->order_id);
            $data->message = $req->message;
            $data->processing = 0;
            $data->delivery = 1;
            $data->use_payment_method = 0;
            $data->update();

            $pro = products::join('carts', 'carts.product_id', '=', 'products.id')
                ->join('orders', 'orders.cart_id', '=', 'carts.id')
                ->where('orders.id', $req->order_id)->select('products.*', 'carts.quantity')->first();
            $pro->stock = $pro->stock - $pro->quantity;
            if ($pro->top_buy == '') {
                $pro->top_buy = $pro->quantity;
            } else {
                $pro->top_buy = $pro->top_buy + $pro->quantity;
            }
            $pro->update();

            $all_data_report = Report::all();

            $result = 0;
            $quantity_order = carts::where('product_id',$pro->id)->sum('quantity');
            $commission_pro = Commission::all()->first();

            foreach($all_data_report as $item){
                if($item->seller_id == $data_seller->id && $item->pro_id == $pro->id)
                {
                $result++;
                $report = Report::find($item->id);
                $report->seller_id = $data_seller->id;
                $report->pro_id = $pro->id;
                $report->code_product = $pro->code_product;
                $report->pro_name = $pro->name;
                $report->pro_price = "$pro->price $";
                $report->quantity_order = $quantity_order;
                $total_price = $report->quantity_order * $pro->price;
                $report->total_price ="$total_price $";
                $total_price_comm = $report->quantity_order * $pro->price * ($commission_pro->commission / 100);
                $total_price_formate = sprintf("%.2f", $total_price_comm);
                $report->commission = "$commission_pro->commission %";
                $report->commission_price = "$total_price_formate $";
                $report->update();

                }
            }
            if($result==0){
                $report = new Report();
                $report->seller_id = $data_seller->id;
                $report->pro_id = $pro->id;
                $report->code_product = $pro->code_product;
                $report->pro_name = $pro->name;
                $report->pro_price = "$pro->price $";
                $report->quantity_order = $quantity_order;
                $total_price = $report->quantity_order * $pro->price;
                $report->total_price ="$total_price $";
                $total_price_comm = $report->quantity_order * $pro->price * ($commission_pro->commission / 100);
                $total_price_formate = sprintf("%.2f", $total_price_comm);
                $report->commission = "$commission_pro->commission %";
                $report->commission_price = "$total_price_formate $";
                $report->save();
            }
            return redirect()->back();
        }
    }

    public function cancel_pending(Request $req)
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            // return $req->cancel_order_id;
            $data = orders::find($req->cancel_order_id);
            $data->message = $req->message;
            $data->seller_cancel = 1;
            $data->use_payment_method = 0;
            $data->update();

            return redirect()->back();
        }
    }

    public function old_order()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            $data = orders::join('carts', 'carts.id', '=', 'orders.cart_id')
                ->join('users', 'users.id', '=', 'carts.user_id')
                ->join('products', 'products.id', '=', 'carts.product_id')
                ->where('products.seller_id', $data_seller->id)
                ->where('orders.delivery', 1)
                ->where('orders.seller_remove_cancel',0)
                // ->orwhere('orders.seller_cancel', 1)
                ->select('products.*', 'carts.total', 'orders.seller_remove_cancel', 'carts.quantity', 'orders.id as order_id', 'orders.seller_cancel',  'orders.pending', 'orders.delivery', 'users.username as u_name', 'users.phone as u_phone', 'users.address as u_address')
                ->orderByDesc('orders.updated_at')
                ->paginate(5);

            return view('seller/old_order', compact('data_seller', 'data'));
        } else {
            return view('seller/login');
        }
    }

    public function profile()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            return view('seller/profile', compact('data_seller'));
        } else {
            return view('seller/profile');
        }
    }
    public function edit_profile()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            $provinces = Province::all();
            return view('seller/editProfile', compact('provinces','data_seller'));
        } else {
            return view('/seller/login');
        }
    }
    public function edit_image(Request $request)
    {
        if (session()->has('seller')) {
            $updateImage = sellers::findOrFail(session('seller'));
            $sellerImage = sellers::find($updateImage->id);
            if ($request->hasfile('imageFile')) {
                $file = $request->file('imageFile');
                $filename = uniqid() . $file->getClientOriginalExtension();
                $file->move(public_path() . '/images/sellerProfile', $filename);
                $sellerImage->profile = $filename;
            }
            $sellerImage->update();
            return redirect()->back();
        }
        return view('/seller/login');
    }
    public function accept_change(Request $request)
    {
        if (session()->has('seller')) {
            $update = sellers::findOrFail(session('seller'));
            $seller = sellers::find($update->id);
            $this->validate($request, [
                'store_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'province' => 'required',
                'address' => 'required',
            ]);
            $seller->store_name = $request->store_name;
            $seller->email = $request->email;
            $seller->phone = $request->phone;
            $seller->province_id = $request->province;
            $seller->address = $request->address;
            $seller->update();
            return redirect()->back()->with('success','Changed Successfully');
        }
        return view('/seller/login');
        // return view('/seller/profile')->with('success','Changed Successfully');

    }
    public function add_product($id)
    {
        $data_seller = sellers::findOrFail(session('seller'));

        $cat = DB::table('se_categories')
            ->join('categories', 'categories.id', '=', 'se_categories.category_id')
            ->where('categories.id', $id)
            ->select('se_categories.*', 'categories.id as main_cat_id')->get();
        $count_pro_out =  $sellerHasProduct = DB::table('products')
        ->join('sellers', 'products.seller_id', '=', 'sellers.id')
        ->where('products.stock', '<=' ,0)
        ->where('sellers.id', $data_seller->id)->count();
        $count_pro =  $sellerHasProduct = DB::table('products')
        ->join('sellers', 'products.seller_id', '=', 'sellers.id')
        ->where('sellers.id', $data_seller->id)
        ->where('products.stock', '>' ,0)
        ->count();
        $brand = brands::all();
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            return view('seller/product/add_product', compact('data_seller', 'count_pro_out','count_pro','brand', 'cat'));
        } else {
            return view('seller/product/add_product');
        }
    }
    public function postProduct(Request $req, $id)
    {
        $pro = new products();

        // $req->validate([
        //     'cover_img'=> 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
        //     'sub_img1' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
        //     'sub_img2' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
        //     'sub_img3' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
        //     'sub_img4' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
        //     'sub_img7' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
        //     'sub_img5' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
        //     'sub_img6' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
        // ]);

        if ($req->hasfile('cover_img')) {
            $file = $req->file('cover_img');
            $filename = uniqid() . $file->getClientOriginalExtension();
            $file->move(public_path() . '/images/imgProduct/', $filename);
            $pro->img_product = $filename;

            if ($req->hasfile('sub_img1')) {
                $file1 = $req->file('sub_img1');
                $filename1 = uniqid() . $file1->getClientOriginalExtension();
                $file1->move(public_path() . '/images/imgProduct/', $filename1);
                $pro->sub_img1 = $filename1;
            }
            if ($req->hasfile('sub_img2')) {
                $file2 = $req->file('sub_img2');
                $filename2 = uniqid() . $file2->getClientOriginalExtension();
                $file2->move(public_path() . '/images/imgProduct/', $filename2);
                $pro->sub_img2 = $filename2;
            }
            if ($req->hasfile('sub_img3')) {
                $file3 = $req->file('sub_img3');
                $filename3 = uniqid() . $file3->getClientOriginalExtension();
                $file3->move(public_path() . '/images/imgProduct/', $filename3);
                $pro->sub_img3 = $filename3;
            }
            if ($req->hasfile('sub_img4')) {
                $file4 = $req->file('sub_img4');
                $filename4 = uniqid() . $file4->getClientOriginalExtension();
                $file4->move(public_path() . '/images/imgProduct/', $filename4);
                $pro->sub_img4 = $filename4;
            }
            if ($req->hasfile('sub_img5')) {
                $file5 = $req->file('sub_img5');
                $filename5 = uniqid() . $file5->getClientOriginalExtension();
                $file5->move(public_path() . '/images/imgProduct/', $filename5);
                $pro->sub_img5 = $filename5;
            }
            if ($req->hasfile('sub_img6')) {
                $file6 = $req->file('sub_img6');
                $filename6 = uniqid() . $file6->getClientOriginalExtension();
                $file6->move(public_path() . '/images/imgProduct/', $filename6);
                $pro->sub_img6 = $filename6;
            }
            if ($req->hasfile('sub_img7')) {
                $file7 = $req->file('sub_img7');
                $filename7 = uniqid() . $file7->getClientOriginalExtension();
                $file7->move(public_path() . '/images/imgProduct/', $filename7);
                $pro->sub_img7 = $filename7;
            }
        } else {
            if ($req->hasfile('sub_img1')) {
                $file1 = $req->file('sub_img1');
                $filename1 = uniqid() . $file1->getClientOriginalExtension();
                $file1->move(public_path() . '/images/imgProduct/', $filename1);
                $pro->img_product = $filename1;

                if ($req->hasfile('sub_img2')) {
                    $file2 = $req->file('sub_img2');
                    $filename2 = uniqid() . $file2->getClientOriginalExtension();
                    $file2->move(public_path() . '/images/imgProduct/', $filename2);
                    $pro->sub_img2 = $filename2;
                }
                if ($req->hasfile('sub_img3')) {
                    $file3 = $req->file('sub_img3');
                    $filename3 = uniqid() . $file3->getClientOriginalExtension();
                    $file3->move(public_path() . '/images/imgProduct/', $filename3);
                    $pro->sub_img3 = $filename3;
                }
                if ($req->hasfile('sub_img4')) {
                    $file4 = $req->file('sub_img4');
                    $filename4 = uniqid() . $file4->getClientOriginalExtension();
                    $file4->move(public_path() . '/images/imgProduct/', $filename4);
                    $pro->sub_img4 = $filename4;
                }
                if ($req->hasfile('sub_img5')) {
                    $file5 = $req->file('sub_img5');
                    $filename5 = uniqid() . $file5->getClientOriginalExtension();
                    $file5->move(public_path() . '/images/imgProduct/', $filename5);
                    $pro->sub_img5 = $filename5;
                }
                if ($req->hasfile('sub_img6')) {
                    $file6 = $req->file('sub_img6');
                    $filename6 = uniqid() . $file6->getClientOriginalExtension();
                    $file6->move(public_path() . '/images/imgProduct/', $filename6);
                    $pro->sub_img6 = $filename6;
                }
                if ($req->hasfile('sub_img7')) {
                    $file7 = $req->file('sub_img7');
                    $filename7 = uniqid() . $file7->getClientOriginalExtension();
                    $file7->move(public_path() . '/images/imgProduct/', $filename7);
                    $pro->sub_img7 = $filename7;
                }
            } elseif ($req->hasfile('sub_img2')) {
                $file2 = $req->file('sub_img2');
                $filename2 = uniqid() . $file2->getClientOriginalExtension();
                $file2->move(public_path() . '/images/imgProduct/', $filename2);
                $pro->img_product = $filename2;

                if ($req->hasfile('sub_img1')) {
                    $file1 = $req->file('sub_img1');
                    $filename1 = uniqid() . $file1->getClientOriginalExtension();
                    $file1->move(public_path() . '/images/imgProduct/', $filename1);
                    $pro->sub_img1 = $filename1;
                }

                if ($req->hasfile('sub_img3')) {
                    $file3 = $req->file('sub_img3');
                    $filename3 = uniqid() . $file3->getClientOriginalExtension();
                    $file3->move(public_path() . '/images/imgProduct/', $filename3);
                    $pro->sub_img3 = $filename3;
                }
                if ($req->hasfile('sub_img4')) {
                    $file4 = $req->file('sub_img4');
                    $filename4 = uniqid() . $file4->getClientOriginalExtension();
                    $file4->move(public_path() . '/images/imgProduct/', $filename4);
                    $pro->sub_img4 = $filename4;
                }
                if ($req->hasfile('sub_img5')) {
                    $file5 = $req->file('sub_img5');
                    $filename5 = uniqid() . $file5->getClientOriginalExtension();
                    $file5->move(public_path() . '/images/imgProduct/', $filename5);
                    $pro->sub_img5 = $filename5;
                }
                if ($req->hasfile('sub_img6')) {
                    $file6 = $req->file('sub_img6');
                    $filename6 = uniqid() . $file6->getClientOriginalExtension();
                    $file6->move(public_path() . '/images/imgProduct/', $filename6);
                    $pro->sub_img6 = $filename6;
                }
                if ($req->hasfile('sub_img7')) {
                    $file7 = $req->file('sub_img7');
                    $filename7 = uniqid() . $file7->getClientOriginalExtension();
                    $file7->move(public_path() . '/images/imgProduct/', $filename7);
                    $pro->sub_img7 = $filename7;
                }
            } elseif ($req->hasfile('sub_img3')) {
                $file3 = $req->file('sub_img3');
                $filename3 = uniqid() . $file3->getClientOriginalExtension();
                $file3->move(public_path() . '/images/imgProduct/', $filename3);
                $pro->img_product = $filename3;

                if ($req->hasfile('sub_img1')) {
                    $file1 = $req->file('sub_img1');
                    $filename1 = uniqid() . $file1->getClientOriginalExtension();
                    $file1->move(public_path() . '/images/imgProduct/', $filename1);
                    $pro->sub_img1 = $filename1;
                }
                if ($req->hasfile('sub_img2')) {
                    $file2 = $req->file('sub_img2');
                    $filename2 = uniqid() . $file2->getClientOriginalExtension();
                    $file2->move(public_path() . '/images/imgProduct/', $filename2);
                    $pro->sub_img2 = $filename2;
                }

                if ($req->hasfile('sub_img4')) {
                    $file4 = $req->file('sub_img4');
                    $filename4 = uniqid() . $file4->getClientOriginalExtension();
                    $file4->move(public_path() . '/images/imgProduct/', $filename4);
                    $pro->sub_img4 = $filename4;
                }
                if ($req->hasfile('sub_img5')) {
                    $file5 = $req->file('sub_img5');
                    $filename5 = uniqid() . $file5->getClientOriginalExtension();
                    $file5->move(public_path() . '/images/imgProduct/', $filename5);
                    $pro->sub_img5 = $filename5;
                }
                if ($req->hasfile('sub_img6')) {
                    $file6 = $req->file('sub_img6');
                    $filename6 = uniqid() . $file6->getClientOriginalExtension();
                    $file6->move(public_path() . '/images/imgProduct/', $filename6);
                    $pro->sub_img6 = $filename6;
                }
                if ($req->hasfile('sub_img7')) {
                    $file7 = $req->file('sub_img7');
                    $filename7 = uniqid() . $file7->getClientOriginalExtension();
                    $file7->move(public_path() . '/images/imgProduct/', $filename7);
                    $pro->sub_img7 = $filename7;
                }
            } elseif ($req->hasfile('sub_img4')) {
                $file4 = $req->file('sub_img4');
                $filename4 = uniqid() . $file4->getClientOriginalExtension();
                $file4->move(public_path() . '/images/imgProduct/', $filename4);
                $pro->img_product = $filename4;

                if ($req->hasfile('sub_img1')) {
                    $file1 = $req->file('sub_img1');
                    $filename1 = uniqid() . $file1->getClientOriginalExtension();
                    $file1->move(public_path() . '/images/imgProduct/', $filename1);
                    $pro->sub_img1 = $filename1;
                }
                if ($req->hasfile('sub_img2')) {
                    $file2 = $req->file('sub_img2');
                    $filename2 = uniqid() . $file2->getClientOriginalExtension();
                    $file2->move(public_path() . '/images/imgProduct/', $filename2);
                    $pro->sub_img2 = $filename2;
                }
                if ($req->hasfile('sub_img3')) {
                    $file3 = $req->file('sub_img3');
                    $filename3 = uniqid() . $file3->getClientOriginalExtension();
                    $file3->move(public_path() . '/images/imgProduct/', $filename3);
                    $pro->sub_img3 = $filename3;
                }

                if ($req->hasfile('sub_img5')) {
                    $file5 = $req->file('sub_img5');
                    $filename5 = uniqid() . $file5->getClientOriginalExtension();
                    $file5->move(public_path() . '/images/imgProduct/', $filename5);
                    $pro->sub_img5 = $filename5;
                }
                if ($req->hasfile('sub_img6')) {
                    $file6 = $req->file('sub_img6');
                    $filename6 = uniqid() . $file6->getClientOriginalExtension();
                    $file6->move(public_path() . '/images/imgProduct/', $filename6);
                    $pro->sub_img6 = $filename6;
                }
                if ($req->hasfile('sub_img7')) {
                    $file7 = $req->file('sub_img7');
                    $filename7 = uniqid() . $file7->getClientOriginalExtension();
                    $file7->move(public_path() . '/images/imgProduct/', $filename7);
                    $pro->sub_img7 = $filename7;
                }
            } elseif ($req->hasfile('sub_img5')) {
                $file5 = $req->file('sub_img5');
                $filename5 = uniqid() . $file5->getClientOriginalExtension();
                $file5->move(public_path() . '/images/imgProduct/', $filename5);
                $pro->img_product = $filename5;

                if ($req->hasfile('sub_img1')) {
                    $file1 = $req->file('sub_img1');
                    $filename1 = uniqid() . $file1->getClientOriginalExtension();
                    $file1->move(public_path() . '/images/imgProduct/', $filename1);
                    $pro->sub_img1 = $filename1;
                }
                if ($req->hasfile('sub_img2')) {
                    $file2 = $req->file('sub_img2');
                    $filename2 = uniqid() . $file2->getClientOriginalExtension();
                    $file2->move(public_path() . '/images/imgProduct/', $filename2);
                    $pro->sub_img2 = $filename2;
                }
                if ($req->hasfile('sub_img3')) {
                    $file3 = $req->file('sub_img3');
                    $filename3 = uniqid() . $file3->getClientOriginalExtension();
                    $file3->move(public_path() . '/images/imgProduct/', $filename3);
                    $pro->sub_img3 = $filename3;
                }
                if ($req->hasfile('sub_img4')) {
                    $file4 = $req->file('sub_img4');
                    $filename4 = uniqid() . $file4->getClientOriginalExtension();
                    $file4->move(public_path() . '/images/imgProduct/', $filename4);
                    $pro->sub_img4 = $filename4;
                }

                if ($req->hasfile('sub_img6')) {
                    $file6 = $req->file('sub_img6');
                    $filename6 = uniqid() . $file6->getClientOriginalExtension();
                    $file6->move(public_path() . '/images/imgProduct/', $filename6);
                    $pro->sub_img6 = $filename6;
                }
                if ($req->hasfile('sub_img7')) {
                    $file7 = $req->file('sub_img7');
                    $filename7 = uniqid() . $file7->getClientOriginalExtension();
                    $file7->move(public_path() . '/images/imgProduct/', $filename7);
                    $pro->sub_img7 = $filename7;
                }
            } elseif ($req->hasfile('sub_img6')) {
                $file6 = $req->file('sub_img6');
                $filename6 = uniqid() . $file6->getClientOriginalExtension();
                $file6->move(public_path() . '/images/imgProduct/', $filename6);
                $pro->img_product = $filename6;

                if ($req->hasfile('sub_img1')) {
                    $file1 = $req->file('sub_img1');
                    $filename1 = uniqid() . $file1->getClientOriginalExtension();
                    $file1->move(public_path() . '/images/imgProduct/', $filename1);
                    $pro->sub_img1 = $filename1;
                }
                if ($req->hasfile('sub_img2')) {
                    $file2 = $req->file('sub_img2');
                    $filename2 = uniqid() . $file2->getClientOriginalExtension();
                    $file2->move(public_path() . '/images/imgProduct/', $filename2);
                    $pro->sub_img2 = $filename2;
                }
                if ($req->hasfile('sub_img3')) {
                    $file3 = $req->file('sub_img3');
                    $filename3 = uniqid() . $file3->getClientOriginalExtension();
                    $file3->move(public_path() . '/images/imgProduct/', $filename3);
                    $pro->sub_img3 = $filename3;
                }
                if ($req->hasfile('sub_img4')) {
                    $file4 = $req->file('sub_img4');
                    $filename4 = uniqid() . $file4->getClientOriginalExtension();
                    $file4->move(public_path() . '/images/imgProduct/', $filename4);
                    $pro->sub_img4 = $filename4;
                }
                if ($req->hasfile('sub_img5')) {
                    $file5 = $req->file('sub_img5');
                    $filename5 = uniqid() . $file5->getClientOriginalExtension();
                    $file5->move(public_path() . '/images/imgProduct/', $filename5);
                    $pro->sub_img5 = $filename5;
                }

                if ($req->hasfile('sub_img7')) {
                    $file7 = $req->file('sub_img7');
                    $filename7 = uniqid() . $file7->getClientOriginalExtension();
                    $file7->move(public_path() . '/images/imgProduct/', $filename7);
                    $pro->sub_img7 = $filename7;
                }
            } elseif ($req->hasfile('sub_img7')) {
                $file7 = $req->file('sub_img7');
                $filename7 = uniqid() . $file7->getClientOriginalExtension();
                $file7->move(public_path() . '/images/imgProduct/', $filename7);
                $pro->img_product = $filename7;

                if ($req->hasfile('sub_img1')) {
                    $file1 = $req->file('sub_img1');
                    $filename1 = uniqid() . $file1->getClientOriginalExtension();
                    $file1->move(public_path() . '/images/imgProduct/', $filename1);
                    $pro->sub_img1 = $filename1;
                }
                if ($req->hasfile('sub_img2')) {
                    $file2 = $req->file('sub_img2');
                    $filename2 = uniqid() . $file2->getClientOriginalExtension();
                    $file2->move(public_path() . '/images/imgProduct/', $filename2);
                    $pro->sub_img2 = $filename2;
                }
                if ($req->hasfile('sub_img3')) {
                    $file3 = $req->file('sub_img3');
                    $filename3 = uniqid() . $file3->getClientOriginalExtension();
                    $file3->move(public_path() . '/images/imgProduct/', $filename3);
                    $pro->sub_img3 = $filename3;
                }
                if ($req->hasfile('sub_img4')) {
                    $file4 = $req->file('sub_img4');
                    $filename4 = uniqid() . $file4->getClientOriginalExtension();
                    $file4->move(public_path() . '/images/imgProduct/', $filename4);
                    $pro->sub_img4 = $filename4;
                }
                if ($req->hasfile('sub_img5')) {
                    $file5 = $req->file('sub_img5');
                    $filename5 = uniqid() . $file5->getClientOriginalExtension();
                    $file5->move(public_path() . '/images/imgProduct/', $filename5);
                    $pro->sub_img5 = $filename5;
                }
                if ($req->hasfile('sub_img6')) {
                    $file6 = $req->file('sub_img6');
                    $filename6 = uniqid() . $file6->getClientOriginalExtension();
                    $file6->move(public_path() . '/images/imgProduct/', $filename6);
                    $pro->sub_img6 = $filename6;
                }
            }
        }

        $generator = uniqid();

        $pro->code_product = $generator;
        $pro->name = $req->name;
        $pro->price = $req->price;
        $pro->description = $req->description;
        $pro->stock = $req->stock;
        $pro->brand_id = $req->brand_id;
        $pro->s_cat_id = $req->category_id;
        $pro->category_id = $id;
        $pro->seller_id = $req->session()->get('seller');

        $pro->save();
        return redirect('/seller/products')->with('product_add', 'Your product has been add successfully!');
    }


    public function logout()
    {
        Session::forget('seller');
        Session::forget('joined');
        return redirect('/blog');
    }
    public function sellerMessages()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
        }
        $id = $data_seller->id;

        $sellerHasMessage = DB::table('messages')
            ->join('sellers', 'messages.seller_id', '=', 'sellers.id')
            ->where('sellers.id', $id)
            ->select('messages.*')
            ->orderByDesc('messages.created_at')
            ->get();
        return view('seller/messages', compact('data_seller', 'sellerHasMessage'));
    }

    public function detailMsg($id)
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
        }
        $message = messages::join('products','products.id','=','messages.pro_id')->where('messages.id',$id)
        ->select('products.*','products.msg as msg_pro','messages.*')
        ->first();
        if ($message->sent == 0) {
            $message->sent = $message->sent;
            return view('seller/detailMessage', compact('message', 'data_seller'));
        } else {
            $message->sent = $message->sent - 1;
            $message->update();
            return view('seller/detailMessage', compact('message', 'data_seller'));
        }
    }
}