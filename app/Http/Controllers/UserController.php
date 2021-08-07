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
            'phone' => 'required|min:9|unique:users,phone',
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

    public function profile($id)
    {
        $data_user = Users::find($id);
        $second_cate = DB::table('se_categories')->get();
        return view('home/user-profile/userProfile',compact('data_user','second_cate'));
    }
    public function update_profile(Request $request, $id){
        $update = Users::find($id);
        $second_cate = DB::table('se_categories')->get();
        $this->validate($request,[
                'username' => 'required',
            ]);
            $update->username = $request->username;
            $update->update();
            if (session()->has('user')) {
                $data_user = Users::findOrFail(session('user'));
                return view('home/user-profile/index', compact('data_user','second_cate'));
            } else {
                return view('home/user-profile/index')->with('success','updated successfully');
            }
    }
    public function history_order($id){
        $data_user = Users::find($id);
        $second_cate = DB::table('se_categories')->get();
        return view('home/user-profile/orderHistory',compact('data_user','second_cate'));
    }
    public function wish_list($id){
        $data_user = Users::find($id);
        $second_cate = DB::table('se_categories')->get();
        return view('home/user-profile/wishList',compact('data_user','second_cate'));
    }
    public function ch_password($id){
        $data_user = Users::find($id);
        $second_cate = DB::table('se_categories')->get();

        return view('home/user-profile/changePassword',compact('data_user','second_cate'));
    }
    public function confirm_ch($id){
        $user = Users::find($id);
        $second_cate = DB::table('se_categories')->get();
        $data = request()->validate([
                'oldpassword' => 'required',
                'newpassword' => 'required',
                'confirmpassword' => 'required',
            ]);
        if ($user) {
        $validPassword = Hash::check($data['oldpassword'], $user->password);
        if ($validPassword) {

            if($data['newpassword']==$data['confirmpassword']){

                $data['newpassword'] = Hash::make($data['newpassword']);
                unset($data['confirmpassword']);
                $pass = $data['newpassword'];
                $user->password = $data['newpassword'];
                $user->update();
            }
        }
        return redirect()->back()->with('success','Successfully Change');
    }
}

    public function logout()
    {
    Session::forget('user');
    Session::forget('joined');
    return redirect('/');
    }
}