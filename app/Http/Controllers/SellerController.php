<?php

namespace App\Http\Controllers;

use App\Models\cards;
use App\Models\carts;
use App\Models\users;
use App\Models\brands;
use App\Models\orders;
use App\Models\sellers;
use App\Models\messages;
use App\Models\products;
use App\Models\receipts;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\se_categories;
use App\Models\users_has_cards;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

// use Symfony\Component\HttpFoundation\Session\Session;

class SellerController extends Controller
{

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
            $seller = DB::table('sellers')->where("phone", "=", $data["email_phone"])->first();
            if ($seller){
                $validPassword = Hash::check($data['password'], $seller->password);
                if ($validPassword) {
                    session()->put('seller', $seller->id);
                    if ($req->has('remeberme')) {
                        Cookie::queue('sellerPhone', $seller->phone, 1440);
                        Cookie::queue(Cookie::forget('sellerEmail'));
                        Cookie::queue('sellerPass', $req->password, 1440);
                    }else{
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
            $seller = DB::table('sellers')->where("email", "=", $data["email_phone"])->first();
            if ($seller){
                $validPassword = Hash::check($data['password'], $seller->password);
                if ($validPassword) {
                    session()->put('seller', $seller->id);
                    if($req->has('remeberme')){
                        Cookie::queue('sellerEmail',$seller->email,1440);
                        Cookie::queue(Cookie::forget('sellerPhone'));
                        Cookie::queue('sellerPass',$req->password,1440);
                    }else{
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

    public function register()
    {
        $data = request()->validate([
            'store_name' => 'required',
            'email' => 'required|email|max:70|unique:sellers,email',
            'phone' => 'required|min:9|unique:sellers,phone',
            'address' => 'required',
            'password' => 'required|min:8',
            'con_password' => 'required|min:8|same:password',
        ]);
        $data['password'] = Hash::make($data['password']);
        unset($data['con_password']);
        $create = sellers::create($data);
        session()->put('seller', $create->id);

        return redirect('/forseller');
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
        return view('seller/register');
    }
    public function dashboard()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            return view('seller/dashboard', compact('data_seller'));
        } else {
            return view('seller/dashboard');
        }
    }

    public function products()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
        }
        $id = $data_seller->id;
        $main_cate = categories::get();
        $sellerHasProduct = DB::table('products')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('sellers.id', $id)
            ->where('products.completed', '=', '1')
            ->select('products.*', 'sellers.store_name', 'sellers.phone', 'sellers.address')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $data_seller = sellers::find($id);

        $i = 0;
        return view('seller/product/listProduct', compact('i', 'data_seller', 'sellerHasProduct', 'main_cate'));
    }
    public function productPending()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
        }
        $id = $data_seller->id;
        $main_cate = categories::get();
        $sellerHasProduct = DB::table('products')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('sellers.id', $id)
            ->where('products.completed', '=', '0')
            ->select('products.*', 'sellers.store_name', 'sellers.phone', 'sellers.address')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $data_seller = sellers::find($id);

        $i = 0;
        return view('seller/product/listProductPending', compact('i', 'data_seller', 'sellerHasProduct', 'main_cate'));
    }
    public function choose_main_cate()
    {
        $main_cate = categories::get();
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            return view('seller/product/main_cate', compact('data_seller', 'main_cate'));
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
                ->select('products.*', 'carts.total', 'orders.seller_cancel', 'orders.pending', 'orders.user_cancel', 'orders.id as order_id', 'carts.quantity', 'users.username as u_name', 'users.phone as u_phone', 'users.address as u_address')
                ->orderBy('updated_at', 'desc')
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
            $pros = products::join('carts', 'carts.product_id', '=', 'products.id')
                ->join('orders', 'orders.cart_id', '=', 'carts.id')
                ->where('orders.id', $req->order_id)
                ->select('products.*', 'carts.quantity')->get();
            foreach ($pros as $pro) {
                $pro->stock = $pro->stock - $pro->quantity;
                $pro->update();
            }
            $data = orders::find($req->order_id);
            $data->pending = 0;
            $data->processing_message = $req->message;
            $data->processing = 1;
            $data->update();
            return redirect()->back();
        }
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
                ->select('products.*', 'carts.total', 'orders.seller_cancel', 'orders.user_cancel', 'orders.processing', 'carts.quantity', 'orders.id as order_id', 'users.username as u_name', 'users.phone as u_phone', 'users.address as u_address')
                ->orderBy('updated_at', 'desc')
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

            $data->update();

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
                ->orwhere('orders.delivery', 0)
                ->select('products.*', 'carts.total', 'orders.seller_remove_cancel', 'carts.quantity', 'orders.id as order_id', 'orders.seller_cancel',  'orders.pending', 'orders.delivery', 'users.username as u_name', 'users.phone as u_phone', 'users.address as u_address')
                ->orderBy('updated_at', 'desc')
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
            return view('seller/editProfile', compact('data_seller'));
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
                'address' => 'required',
            ]);
            $seller->store_name = $request->store_name;
            $seller->email = $request->email;
            $seller->phone = $request->phone;
            $seller->address = $request->address;
            $seller->update();
            return redirect()->back();
        }
        return view('/seller/login');
        // return view('/seller/profile')->with('success','Changed Successfully');

    }
    public function add_product($id)
    {
        $cat = DB::table('se_categories')
            ->join('categories', 'categories.id', '=', 'se_categories.category_id')
            ->where('categories.id', $id)
            ->select('se_categories.*', 'categories.id as main_cat_id')->get();
        $brand = brands::all();
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            return view('seller/product/add_product', compact('data_seller', 'brand', 'cat'));
        } else {
            return view('seller/product/add_product');
        }
    }
    public function postProduct(Request $req, $id)
    {
        $req->validate([
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,webp.jpg,png,gif,csv,txt,pdf|max:2048'
        ]);
        if ($req->hasfile('imageFile')) {
            foreach ($req->file('imageFile') as $file) {
                $name = uniqid() . $file->getClientOriginalExtension();
                $file->move(public_path() . '/images/imgProduct/', $name);
                $imgData[] = $name;
            }

            $pro = new products();

            $pro->name = $req->name;
            $pro->price = $req->price;
            $pro->description = $req->description;
            $pro->stock = $req->stock;
            $pro->brand_id = $req->brand_id;
            $pro->s_cat_id = $req->category_id;
            $pro->category_id = $id;
            $pro->img_product = json_encode($imgData);
            $pro->seller_id = $req->session()->get('seller');
        }
        $pro->save();
        return redirect('/seller/productPending')->with('product_add', 'Your product has been add successfully!');
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
        $message = messages::find($id);
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