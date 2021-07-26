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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// use Symfony\Component\HttpFoundation\Session\Session;

class SellerController extends Controller
{

    public function login_page()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            return view('seller/profile', compact('data_seller'));
        } else {
            return view('seller/login');
        }
    }
    public function login()
    {
        $email_phone = request()->input('email_phone');

        if (is_numeric($email_phone)) {
            $data = request()->validate([
                'email_phone' => 'required',
                'password' => 'required',
            ]);
            $seller = DB::table('sellers')->where("phone", "=", $data["email_phone"])->first();
        } elseif (filter_var($email_phone, FILTER_VALIDATE_EMAIL)) {
            $data = request()->validate([
                'email_phone' => 'required',
                'password' => 'required',
            ]);
            $seller = DB::table('sellers')->where("email", "=", $data["email_phone"])->first();
        }
        if ($seller) {
            $validPassword = Hash::check($data['password'], $seller->password);
            if ($validPassword) {
                session()->put('seller', $seller->id);
                return redirect('/blog')->with('success', "Successfully Login!");
            }
            return redirect()->back()->with("fail", "Incorrect Phone Number or password!")->withInput();
        }
        return redirect()->back()->with("fail", "Incorrect Phone Number or password!")->withInput();
    }

    public function register()
    {
        $data = request()->validate([
            'store_name' => 'required',
            'email' => 'required|email|max:70|unique:sellers,email',
            'phone' => 'required|unique:sellers,phone',
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

    public function products($id)
    {
        $sellerHasProduct = DB::table('products')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('sellers.id', $id)
            ->select('products.*', 'sellers.store_name', 'sellers.phone', 'sellers.address')->get();
        $data_seller = sellers::find($id);
        $i = 0;
        return view('seller/product/listProduct', compact('i', 'data_seller', 'sellerHasProduct'));
    }
    public function add_product()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            return view('seller/product/add_product',compact('data_seller'));
        }else{
            return view('seller/product/add_product');
        }
    }

    public function new_order()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            return view('seller/new_order',compact('data_seller'));
        }else{
            return view('seller/new_order');
        }
    }

    public function old_order()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            return view('seller/old_order',compact('data_seller'));
        }else{
            return view('seller/old_order');
        }
    }

    public function profile()
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            return view('seller/profile',compact('data_seller'));
        }else{
            return view('seller/profile');
        }
    }


    public function postProduct(Request $req)
    {
        // $req->validate([
        //     'imageFile' => 'required',
        //     'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        //   ]);

        if ($req->hasfile('imageFile')) {
            foreach ($req->file('imageFile') as $file) {
                $name = uniqid() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/imgProduct/', $name);
                $imgData[] = $name;
            }

            $pro = new products();

            $pro->name = $req->name;
            $pro->price = $req->price;
            $pro->description = $req->description;
            $pro->stock = $req->stock;
            $pro->brand_id = $req->brand_id;
            $pro->category_id = $req->category_id;
            $pro->img_product = json_encode($imgData);
            $pro->seller_id = $req->session()->get('seller');
        }
        $pro->save();
        return redirect('/');
    }


    public function logout()
    {
        Session::forget('seller');
        Session::forget('joined');
        return redirect('/blog');
    }
}