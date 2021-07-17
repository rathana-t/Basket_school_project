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

class SellerController extends Controller
{
    public function dashboard()
    {
        return view('seller/dashboard');
    }

    public function add_product()
    {
        return view('seller/add_product');
    }

    public function new_order()
    {
        return view('seller/new_order');
    }

    public function old_order()
    {
        return view('seller/old_order');
    }

    public function profile()
    {
        return view('seller/profile');
    }
}