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
    public function user_cancel_order($id)
    {
        // return $req->cancel_order_id;
        $data = orders::find($id);
        // $data->message = $req->message;
        $data->user_cancel = 1;
        $data->update();

        return redirect('/order');
    }
    public function delete_card($id)
    {
        if (session()->has('user')) {
            $data = orders::find($id);
            $data->delete();
            return redirect('/message');
        }
    }
    public function order_use_payment_method(Request $req)
    {
        $data_user = Users::findOrFail(session('user'));
        $card = cards::where('user_id',$data_user->id)->first();
        if(!$card){
            $card = '';
        }
        $second_cate = DB::table('se_categories')->get();
        $address = $req->address;
        return view('home/user-profile/order_by_wing', compact('data_user', 'address','card'));
    }
    public function order_payment(Request $req){
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            $this->validate($req,[
                'id_card' => 'required|min:16|max:16',
                'cvv' => 'required|min:3|max:3'
            ]);

            $data_user->address = $req->address;
            $data_user->update();

            $card = cards::where('user_id',$data_user->id)->first();
                if($card){
                    $card->number = $req->id_card;
                    $card->month = $req->month;
                    $card->year = $req->year;
                    $card->cvv = $req->cvv;

                    $card->update();

                }else{
                    $card = new cards();
                    $card->user_id = $data_user->id;
                    $card->number = $req->id_card;
                    $card->month = $req->month;
                    $card->year = $req->year;
                    $card->cvv = $req->cvv;

                    $card->save();
                }
            $cart = carts::join('products', 'products.id', '=', 'carts.product_id')
                ->where('carts.user_id', '=', $data_user->id)
                ->where('carts.in_order', 0)
                ->select('products.*', 'carts.id as cart_id','carts.user_id')->get();
                // $data = request()->validate([
                //    'id_card' => 'required|min:12|max:12'
                // ]);
                // return $req->year;

            foreach ($cart as $item) {
                $set_cart = carts::find($item->cart_id);
                $set_cart->in_order = 1;
                $set_cart->update();
            }
            foreach ($cart as $item) {
                $order = new orders();
                $order->cart_id = $item->cart_id;
                $order->use_payment_method = 1;
                $order->user_id = $item->user_id;
                $order->seller_id = $item->seller_id;
                $order->save();
            }


            return redirect("/order");
        }
    }
    public function order(Request $req)
    {
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));

            $data_user->address = $req->address;
            $data_user->update();

            $cart = carts::join('products', 'products.id', '=', 'carts.product_id')
                ->where('carts.user_id', '=', $data_user->id)
                ->where('carts.in_order', 0)
                ->select('products.*', 'carts.id as cart_id','carts.user_id')->get();
            // $data = request()->validate([
            //    'id_card' => 'required|min:12|max:12'
            // ]);
            // $this->validate($req,[
            //     'id_card' => 'required|min:12|max:12'
            // ]);

            foreach ($cart as $item) {
                $set_cart = carts::find($item->cart_id);
                $set_cart->in_order = 1;
                $set_cart->update();
            }

            foreach ($cart as $item) {
                $order = new orders();
                $order->cart_id = $item->cart_id;
                $order->pending = 1;
                $order->user_id = $item->user_id;
                $order->seller_id = $item->seller_id;
                $order->save();
            }


            return redirect("/order");
        }
    }
}