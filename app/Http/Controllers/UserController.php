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

    public function profile($id)
    {
        $data_user = Users::find($id);
        return view('home/u_profile',compact('data_user'));
    }
    
    public function logout()
    {
    Session::forget('user');
    Session::forget('joined');
    return redirect('/');
    }
}
