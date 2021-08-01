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
    public function update(Request $request, $id)
    {
        $pro = products::find($id);
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);
        if ($request->hasfile('imageFile')) {
            foreach ($request->file('imageFile') as $file) {
                $name = uniqid() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/imgProduct/', $name);
                $imgData[] = $name;
            }

            $pro->name = $request->name;
            $pro->price = $request->price;
            $pro->description = $request->description;
            $pro->stock = $request->stock;
            $pro->brand_id = $request->brand_id;
            $pro->s_cat_id = $request->category_id;
            $pro->img_product = json_encode($imgData);
            $pro->seller_id = $request->session()->get('seller');

        }

        $pro->update();
        return redirect('/seller/products');

    }
}