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

class OrderController extends Controller
{
    public function order(Request $req){
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));

            $data_user->address = $req->address;
            $data_user->update();

            $cart = carts::join('products', 'products.id', '=', 'carts.product_id')
            ->where('carts.user_id', '=', $data_user->id)
            ->where('carts.in_order',0)
            ->select('products.*', 'carts.id as cart_id')->get();

            foreach($cart as $item){
                $order = new orders();
                $order->cart_id = $item->cart_id;
                $order->pending = 1;
                $order->save();
            }
            foreach($cart as $item){
                $set_cart = carts::find($item->cart_id);
                $set_cart->in_order = 1;
                $set_cart->update();
            }
            return redirect("/cart");
        }
    }
}