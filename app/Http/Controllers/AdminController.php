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

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function user()
    {
        $users = users::all();
        return view('admin/user/user', compact('users'));
    }

    public function userDetail($id)
    {
        $user = users::find($id);
        return view('admin/user/userDetail', compact('user'));
    }

    public function seller()
    {
        $sellers = sellers::all();
        return view('admin/seller/seller', compact('sellers'));
    }
    public function sellerDetail($id)
    {
        $seller = sellers::find($id);
        return view('admin/seller/sellerDetail', compact('seller'));
    }
    public function brand()
    {
        return view('admin/brand');
    }

    public function addBrand()
    {
        return view('admin/addBrand');
    }

    public function storeBrand(Request $req)
    {
        $brand = new brands();
        $brand->name = $req->name;
        if ($req->hasFile('brand_img')) {
            $file = $req->file('brand_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/brandImages', $filename);
            $brand->brand_img = $filename;
        } else {
            return $req;
            $brand->brand_img = '';
            echo "Error";
        }
        $brand->save();
        return redirect('/admin/dashboard')->with('brand_add', '100%');
    }

    public function category()
    {
        return view('admin/category');
    }
    public function addCategory()
    {
        return view('admin/addcategory');
    }
    public function storeCategory(Request $req)
    {
        $category = new categories();
        $category->name = $req->name;
        if ($req->hasFile('category_img')) {
            $file = $req->file('category_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/categoryImages', $filename);
            $category->category_img = $filename;
        } else {
            return $req;
            $category->category_img = '';
            echo "Error";
        }
        $category->save();
        return redirect('/admin/dashboard')->with('category_add', '100%');
    }

    public function product()
    {
        return view('admin/product');
    }
}