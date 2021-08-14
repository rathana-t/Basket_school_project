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
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
// use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{



    public function order()
    {
        $second_cate = DB::table('se_categories')->get();
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));

            $data = orders::join('carts', 'carts.id', '=', 'orders.cart_id')
                ->join('products', 'products.id', '=', 'carts.product_id')
                ->where('carts.user_id', $data_user->id)
                ->where('orders.delivery', '=', '0')
                ->select('products.*', 'orders.*', 'carts.quantity', 'carts.total')->orderByDesc('orders.updated_at')->get();

            return view('home/user-profile/order', compact('second_cate', 'data', 'data_user'));
        }
        return view('home/login', compact('second_cate'));
    }
    function signin()
    {
        $data = request()->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);
        $user = DB::table('users')->where("phone", "=", $data["phone"])->first();
        if ($user) {
            $validPassword = Hash::check($data['password'], $user->password);
            if ($validPassword) {
                session()->put('user', $user->id);
                return redirect('/')->with('success', "Successfully Login!");
            }
            return redirect()->back()->with("fail", "Incorrect Phone Number or password!")->withInput();
        }
        return redirect()->back()->with("fail", "Incorrect Phone Number or password!")->withInput();
    }

    function register()
    {
        $data = request()->validate([
            'username' => 'required',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:8',
            'con_password' => 'required|min:8|same:password',
        ]);
        $data['password'] = Hash::make($data['password']);
        unset($data['con_password']);
        $create = users::create($data);
        session()->put('user', $create->id);
        return redirect('/')->with('success', 'Successfully Registered!');
        // return redirect('/signin')->with('success', 'Successfully Registered!');
    }

    public function profile()
    {
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
        } else {
            return view('home/login', compact('second_cate'));
        }
        $second_cate = DB::table('se_categories')->get();
        return view('home/user-profile/userProfile', compact('data_user', 'second_cate'));
    }
    public function update_profile(Request $request, $id)
    {
        $update = Users::find($id);
        $second_cate = DB::table('se_categories')->get();
        $this->validate($request, [
            'username' => 'required',
        ]);
        $update->username = $request->username;
        $update->update();
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function wish_list()
    {
        $second_cate = DB::table('se_categories')->get();
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            $data_pro = products::join('wishlist', 'wishlist.pro_id', '=', 'products.id')
                ->where('wishlist.u_id', $data_user->id)
                ->select('products.*', 'wishlist.id as wish_id')
                ->get();

            $test = 0;
            foreach ($data_pro as $item) {
                $test++;
            }
            return view('home/user-profile/wishList', compact('data_user', 'second_cate', 'data_pro', 'test'));
        } else {
            return view('home/login', compact('second_cate'));
        }
    }
    public function ch_password()
    {
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
        } else {
            return view('home/login', compact('second_cate'));
        }
        $second_cate = DB::table('se_categories')->get();

        return view('home/user-profile/changePassword', compact('data_user', 'second_cate'));
    }
    public function confirm_ch($id)
    {
        $user = Users::find($id);
        $second_cate = DB::table('se_categories')->get();
        $data = request()->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required:samepassword',
        ]);
        if ($user) {
            $validPassword = Hash::check($data['oldpassword'], $user->password);
            if ($validPassword) {

                if ($data['newpassword'] == $data['confirmpassword']) {

                    $data['newpassword'] = Hash::make($data['newpassword']);
                    unset($data['confirmpassword']);
                    $pass = $data['newpassword'];
                    $user->password = $data['newpassword'];
                    $user->update();
                    return redirect()->back()->with('success', 'Successfully update');
                }
            }
            return redirect()->back()->with('Error', 'Incorrect Input');
        }
    }
    public function history_order()
    {
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));

            $data = orders::join('carts', 'carts.id', '=', 'orders.cart_id')
                ->join('products', 'products.id', '=', 'carts.product_id')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->where('carts.user_id', $data_user->id)
                ->where('orders.delivery', '=', '1')
                ->select('products.*', 'orders.created_at as cre', 'orders.updated_at as up', 'carts.quantity', 'carts.total', 'brands.name as brandName')->orderByDesc('orders.updated_at')->get();
        } else {
            return view('home/login', compact('second_cate'));
        }
        $second_cate = DB::table('se_categories')->get();
        return view('home/user-profile/orderHistory', compact('data_user', 'second_cate', 'data'));
    }
    public function confirm_order_prooduct()
    {
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
            return view('home/user-profile/confirm_order', compact('quantity', 'data_user',  'data_pro', 'counter', 'total_price_all_quantity'));
        } else {
            return view('home/login');
        }
    }

    public function logout()
    {
        Session::forget('user');
        Session::forget('joined');
        return redirect('/');
    }
}