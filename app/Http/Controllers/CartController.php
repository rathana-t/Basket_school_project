<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\orders;
use App\Models\wishlist;
use App\Models\products;
use App\Models\receipts;
use App\Models\sellers;
use App\Models\users;
use App\Models\carts;
use App\Models\cards;
use App\Models\brands;
use App\Models\users_has_cards;
use App\Http\Controllers\Controller;
use CreatWhishlistTable;
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
        $data_user = Users::findOrFail(session('user'));
        $pro = products::find($request->product_id);
        foreach ($allcart as $cart) {
            if ($cart->user_id ==  $data_user->id && $request->product_id == $cart->product_id && $cart->in_order == 0) {
                $cart->quantity = $cart->quantity +  1;
                $cart->total = $cart->quantity * $pro->price;
                $cart->update();
                if ($request->has('redirect')) {
                    return redirect()->route('route_cart');
                }
        $total = HomeController::countCart();

                return response()->json([
                    'status'=>200,
                    'total'=>$total,
                    'message'=> 'Added to wishlist',
                ]);
            }
        }
        $newcart = new carts();

        $newcart->quantity = 1;
        $newcart->total = 1 * $pro->price;
        $newcart->user_id = $data_user->id;
        $newcart->product_id = $request->product_id;

        $newcart->save();
        $total = HomeController::countCart();

        if ($request->has('redirect')) {
            return redirect()->route('route_cart');
        }
        return response()->json([
            'status'=>200,
            'total'=>$total,
            'message'=> 'Added to wishlist',
        ]);
    }
    public function remove_cart(Request $req)
    {
        $cart_id = $req->input('remove_cart_id');
        $cart = carts::find($cart_id);
        $cart->delete();
        return redirect()->back();
    }
    public function edit_cart_quantity(Request $req)
    {
        // return  $req->all();
        // $cart_id = $req->id;
        // $cart = carts::find($cart_id);
        // $data_pro = products::join('carts', 'carts.product_id', '=', 'products.id')->where('carts.id', $cart_id)->get();
        // $price = 0;
        // foreach ($data_pro as $item) {
        //     $price = $item->price;
        // }
        // // dd($price);
        // // $cart->quantity = $req->quantity;
        // $cart->total = $price * $cart->quantity;
        // $cart->update();
        // return redirect()->back();

        $cart_id = $req->edit_cart_id;
        $cart = carts::find($cart_id);
        $data_pro = products::join('carts', 'carts.product_id', '=', 'products.id')->where('carts.id', $cart_id)->get();
        $price = 0;
        foreach ($data_pro as $item) {
            $price = $item->price;
        }
        // dd($price);
        $cart->quantity = $req->edit_cart_value;
        $cart->total = $price * $cart->quantity;
        $cart->update();
        return redirect()->back();
    }

    public function add_to_wishlist(Request $reg)
    {
        $data_user = Users::findOrFail(session('user'));
        $allwishlist = wishlist::all();
        foreach ($allwishlist as $wishlist) {
            if ($wishlist->u_id ==  $data_user->id && $reg->pro_id == $wishlist->pro_id) {
                $update = wishlist::find($wishlist->id);
                $update->delete();

                // $update->u_id = $data_user->id;
                // $update->pro_id = $reg->pro_id;
                // $update->update();
                // return response()->json([
                //     'status'=>200,
                //     'message'=> 'Added to wishlist',
                // ]);
            }
        }
        $wishlist = new wishlist();
        $wishlist->u_id = $data_user->id;
        $wishlist->pro_id = $reg->pro_id;

        $wishlist->save();
        $totalWishlist = HomeController::countWishlist();

        return response()->json([
            'status'=>200,
            'totalWishlist'=>$totalWishlist,
            'message'=> 'Added to wishlist',
        ]);

        // return redirect()->back()->with('add-to-wishlist-success', 'Added to wishlist');
    }
    public function add_to_wishlist2($id, $id2)
    {

        $allwishlist = wishlist::all();
        foreach ($allwishlist as $wishlist) {
            if ($wishlist->u_id ==  $id && $id2 == $wishlist->pro_id) {
                return redirect()->back()->with('add-to-wishlist-success', 'Added to wishlist');
            }
        }
        // $data_user = Users::findOrFail(session('user'));
        $wishlist = new wishlist();
        $wishlist->u_id = $id;
        $wishlist->pro_id = $id2;

        $wishlist->save();

        return redirect()->back()->with('add-to-wishlist-success', 'Added to wishlist');
    }
    public function remove_wishlist(Request $req)
    {
        $wish_id = $req->input('remove_wish_id');
        $wish = wishlist::find($wish_id);
        $wish->delete();
        return redirect()->back()->with('remove-wishlist-success', 'Removed');
    }
}