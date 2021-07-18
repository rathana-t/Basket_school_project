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

class HomeController extends Controller
{
    public function index()
    {
        if (session()->has('user')) {
            $data_user = Users::findOrFail(session('user'));
            return view('home/index',compact('data_user'));
        }else{
            return view('home/index');
        }
    }

    public function login()
    {
        return view('home/login');
    }

    public function reg()
    {
        return view('home/reg');
    }

    public function detail()
    {
        return view('home/detailPage');
    }
    
    public function blog(){
        return view('blog/blog');
    }
}