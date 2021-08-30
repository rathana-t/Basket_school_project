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

class ProductController extends Controller
{
    public function update(Request $req, $id)
    {
        $pro = new products();

        $pro = products::find($id);
        $this->validate($req, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            // 'cover_img' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
            // 'sub_img1' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
            // 'sub_img2' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
            // 'sub_img3' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
            // 'sub_img4' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
            // 'sub_img5' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
            // 'sub_img6' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
            // 'sub_img7' => 'mimes:jpeg,jfif,webp,jpg,png,gif|max:2048',
        ]);
        if ($req->hasfile('cover_img')) {
            $file = $req->file('cover_img');
            $filename = uniqid() . $file->getClientOriginalExtension();
            $file->move(public_path() . '/images/imgProduct/', $filename);
            $pro->img_product = $filename;

            }
        if ($req->hasfile('sub_img1')) {
            $file1 = $req->file('sub_img1');
            $filename1 = uniqid() . $file1->getClientOriginalExtension();
            $file1->move(public_path() . '/images/imgProduct/', $filename1);
            $pro->sub_img1 = $filename1;

        }
        if ($req->hasfile('sub_img2')) {
            $file2 = $req->file('sub_img2');
            $filename2 = uniqid() . $file2->getClientOriginalExtension();
            $file2->move(public_path() . '/images/imgProduct/', $filename2);
            $pro->sub_img2 = $filename2;

        }
        if ($req->hasfile('sub_img3')) {
            $file3 = $req->file('sub_img3');
            $filename3 = uniqid() . $file3->getClientOriginalExtension();
            $file3->move(public_path() . '/images/imgProduct/', $filename3);
            $pro->sub_img3 = $filename3;

        }
        if ($req->hasfile('sub_img4')) {
            $file4 = $req->file('sub_img4');
            $filename4 = uniqid() . $file4->getClientOriginalExtension();
            $file4->move(public_path() . '/images/imgProduct/', $filename4);
            $pro->sub_img4 = $filename4;

        }
        if ($req->hasfile('sub_img5')) {
            $file5 = $req->file('sub_img5');
            $filename5 = uniqid() . $file5->getClientOriginalExtension();
            $file5->move(public_path() . '/images/imgProduct/', $filename5);
            $pro->sub_img5 = $filename5;

        }
        if ($req->hasfile('sub_img6')) {
            $file6 = $req->file('sub_img6');
            $filename6 = uniqid() . $file6->getClientOriginalExtension();
            $file6->move(public_path() . '/images/imgProduct/', $filename6);
            $pro->sub_img6 = $filename6;

        }
        if ($req->hasfile('sub_img7')) {
            $file7 = $req->file('sub_img7');
            $filename7 = uniqid() . $file7->getClientOriginalExtension();
            $file7->move(public_path() . '/images/imgProduct/', $filename7);
            $pro->sub_img7 = $filename7;
        }

            $pro->name = $req->name;
            $pro->price = $req->price;
            $pro->description = $req->description;
            $pro->stock = $req->stock;
            $pro->brand_id = $req->brand_id;
            $pro->s_cat_id = $req->category_id;
            $pro->seller_id = $req->session()->get('seller');

        $pro->update();
        return redirect('/seller/products');

    }
}