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
        $allcart = carts::all();
    foreach($allcart as $cart){
        if ($cart->user_id ==  $request->user_id && $request->product_id == $cart->product_id) {
                $cart->quantity = $cart->quantity +  $request->quantity;
                $cart->total=$cart->quantity * $request->total;

                $cart->update();
                return redirect()->back();
        }
    }
    $newcart = new carts();

    $newcart->quantity = $request->quantity;
    $newcart->total = $request->total *  $request->quantity;
    $newcart->user_id = $request->user_id;
    $newcart->product_id = $request->product_id;

    $newcart->save();
    return redirect()->back();
    }
    public function remove_cart(Request $req){
        $cart_id = $req->input('remove_cart_id');
        $cart = carts::find($cart_id);
        $cart->delete();
        return redirect()->back();
    }
    public function edit_cart_quantity(Request $req)
    {
        $cart_id = $req->input('edit_cart_id');
        $cart = carts::find($cart_id);
        $cart->quantity= $req->input('edit_cart_value');
        $cart->update();
        return redirect()->back();
    }
}