<?php

namespace App\Http\Controllers;

use App\Models\cards;
use App\Models\carts;
use App\Models\users;
use App\Models\brands;
use App\Models\orders;
use App\Models\BadWord;
use App\Models\Comment;
use App\Models\sellers;
use App\Models\products;
use App\Models\Province;
use App\Models\receipts;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\users_has_cards;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\PHP;

// use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{
    public function get_comment(Request $req){
        $comment = Comment::join('users','users.id','=','comments.user_id')
        ->where('comments.pro_id',$req->product_comment_id)->orderBy('comments.created_at','asc')
        ->select('comments.*','comments.created_at as time','users.*','users.id as user_id')
        ->get();
        return response()->json([
            'comment'=>$comment,
        ]);
    }

    public function post_comment(Request $req){


        $checker = BadWord::all();

        $comment = new Comment();
        $comment->user_id = $req->user_id;
        $comment->pro_id = $req->product_comment_id;

        $comment->comment = $req->comment;

        $comment->save();
        return response()->json([
            'status'=>200,
            // 'message'=> 'Added to wishlist',
        ]);
        // return redirect()->back();

    }

    public function order()
    {
        $second_cate = DB::table('se_categories')->get();
        if (session()->has('user')) {
            $data_user = users::findOrFail(session('user'));

            $data = orders::join('carts', 'carts.id', '=', 'orders.cart_id')
                ->join('products', 'products.id', '=', 'carts.product_id')
                ->where('carts.user_id', $data_user->id)
                ->where('orders.seller_cancel', 0)
                ->where('carts.in_order', 1)
                ->select('products.*', 'orders.*', 'orders.id as order_id', 'carts.quantity', 'carts.total')
                ->orderByDesc('orders.updated_at')
                ->get();

            $countCancel =  orders::join('carts', 'carts.id', '=', 'orders.cart_id')
                ->join('products', 'products.id', '=', 'carts.product_id')
                ->where('carts.user_id', $data_user->id)
                ->where('orders.seller_cancel', 1)
                ->count();
            $count = 0;
            if ($data) {
                $count = 1;
            }
            return view('home/user-profile/order', compact('second_cate', 'count', 'data', 'data_user', 'countCancel'));
        }
        return view('home/login', compact('second_cate'));
    }
    function signin(Request $req)
    {
        // $data = request()->validate([
        //     'phone' => 'required|min:9|max:10',
        //     'password' => 'required',
        // ]);

        $data = Validator::make($req->all(),[
            'phone' => 'required|min:9|max:10',
            'password' => 'required',
        ]);

        // if($data->fails()){
        //     return response()->json([
        //     'status'=>0,
        //     'error'=>$data->getMessageBag(),
        //     ]);
        // }else{
            $user = DB::table('users')->where("phone", "=", $req->phone)->first();
            if ($user) {
                $validPassword = Hash::check($req->password, $user->password);
                if ($validPassword) {
                    session()->put('user', $user->id);
                    // if ($req->has('remeberme')) {
                    Cookie::queue(cookie()->forever('userPhone', $req->phone));
                    Cookie::queue(cookie()->forever('userPass', $req->password));
                    // cookie()->forever('userPass', $req->password);
                    // Cookie::forev('userPhone',$req->phone,1440);
                    //     // Cookie::queue('userPass',$req->password,1440);
                    // } else {
                    //     Cookie::queue(Cookie::forget('userPhone'));
                    //     Cookie::queue(Cookie::forget('userPass'));
                    // }
                    if ($user->type == "admin") {
                        return redirect('/admin');
                    }
                    return redirect('/')->with('success', "Successfully Login!");
                }
                // return response()->json(['status'=>0,
                // 'error'=>$data->getMessageBag(),]);
                return redirect()->back()->with('fail', "Incorrect Phone Number or password!")->withInput();
            }
            // return response()->json(['status'=>0,
            // 'error'=>$data->getMessageBag(),]);
        // }
        return redirect()->back()->with('fail', "Incorrect Phone Number or password!")->withInput();
    }

    function register()
    {
        $data = request()->validate([
            'username' => 'required',
            'phone' => 'required|min:9|max:10|unique:users,phone',
            'password' => 'required|min:8',
            'con_password' => 'required|min:8|same:password',
        ]);
        // 12345678
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
        $provinces = Province::all();
        $second_cate = DB::table('se_categories')->get();
        return view('home/user-profile/userProfile', compact('data_user', 'provinces', 'second_cate'));
    }
    public function update_profile(Request $request, $id)
    {
        $update = Users::find($id);
        $second_cate = DB::table('se_categories')->get();
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|max:70|unique:users,email',
        ]);
        $update->username = $request->username;
        $update->address = $request->address;
        $update->email = $request->email;
        $update->province_id = $request->province;
        $update->update();
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            return redirect()->back()->with('done', '100%');
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
                ->orderByDesc('wishlist.updated_at')
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
                ->select('products.*', 'orders.message', 'orders.created_at as cre', 'orders.updated_at as up', 'carts.quantity', 'carts.total', 'brands.name as brandName')
                ->orderByDesc('orders.updated_at')
                ->get();
        } else {
            return view('home/login', compact('second_cate'));
        }
        $second_cate = DB::table('se_categories')->get();
        return view('home/user-profile/orderHistory', compact('data_user', 'second_cate', 'data'));
    }
    public function switch_acc()
    {
        $second_cate = DB::table('se_categories')->get();
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
        } else {
            return view('home/login');
        }
        // , 'second_cate'

        return view('home/user-profile/switch', compact('data_user'));
    }
    public function accept_switch(Request $req)
    {
        $data = request()->validate([
            'phone' => 'required|min:9|max:10',
            'password' => 'required',
        ]);
        $user = DB::table('users')->where("phone", "=", $data["phone"])->first();
        if ($user) {
            $validPassword = Hash::check($data['password'], $user->password);
            if ($validPassword) {
                Session::forget('user');
                Session::forget('joined');
                session()->put('user', $user->id);
                return redirect('profile')->with('success', "Successfully Login!");
            }
            return redirect()->back()->with("fail", "Incorrect Phone Number or password!")->withInput();
        }
        return redirect()->back()->with("fail", "Incorrect Phone Number or password!")->withInput();
    }
    public function confirm_order_prooduct(Request $req)
    {
        $second_cate = DB::table('se_categories')->get();
        $payment = $req->payment;
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
            if ($payment == 'wing') {
                return view('home/user-profile/confirm_order_payment', compact('second_cate', 'payment', 'quantity', 'data_user',  'data_pro', 'counter', 'total_price_all_quantity'));
            } else {
                return view('home/user-profile/confirm_order', compact('second_cate', 'payment', 'quantity', 'data_user',  'data_pro', 'counter', 'total_price_all_quantity'));
            }
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