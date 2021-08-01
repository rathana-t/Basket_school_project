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
use Symfony\Component\HttpFoundation\Session\Session;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        // if (session()->has('user')){
        //     $data_user = Users::findOrFail(session('user'));
        // }
        // $cart = carts::find($data_user->id);
        // $pro = products::select('price')->where('id', $id)->get();
        // $price = $pro;
        // $cart->quantity++;
        // $total=$cart->quantity;quantity
        // $cart->total = $total * 9;
        // $cart->user_id=$data_user->id;
        // $cart->product_id=$id;
        // $user = carts::where('user_id',$data_user->id)->get();
        // if($user){
            // $cart = carts::find($request->user_id);
        // }elseif($user){
        // }
        $cart = new carts();

        $cart->quantity = $request->quantity;
        $cart->total = $request->total *  $request->quantity;
        $cart->user_id = $request->user_id;
        $cart->product_id = $request->product_id;

        $cart->save();
        return redirect()->back();
    }
}