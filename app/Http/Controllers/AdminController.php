<?php

namespace App\Http\Controllers;

use App\Models\cards;
use App\Models\carts;
use App\Models\users;
use App\Models\brands;
use App\Models\orders;
use App\Models\sellers;
use App\Models\messages;
use App\Models\products;
use App\Models\receipts;
use App\Models\Wishlist;
use Carbon\Carbon;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\se_categories;
use App\Models\users_has_cards;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\commissions;
use App\Models\Province;
use App\Models\TNC;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\se_categories as s_cat;
use CreateCommisssionTable;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function productRequestReject(Request $req, $id)
    {
        $product = products::find($id);
        $product->msg = $req->msg;
        $product->admin_reject = 1;
        $product->update();
        return redirect('/admin/productRequest')->with('reject_request', 'Product was Rejected !');
    }
    public function dashboard()
    {
        $countUser = DB::table('users')->count();
        $countShop = DB::table('sellers')->where('pending', '1')->count();
        $countPruduct = DB::table('products')
            ->where('completed', 1)
            ->count();
        $countPruductPending = DB::table('products')
            ->where('completed', 0)
            ->count();
        $countCate = DB::table('categories')->count();
        $countSmallCate = DB::table('se_categories')->count();
        $countBrand = DB::table('brands')->count();
        $countOrder = DB::table('orders')->count();
        $countShopPending = sellers::where('pending', '0')->count();
        $sumTotalOrder = DB::table('orders')
            ->join('carts', 'orders.cart_id', 'carts.id')
            ->select('orders.*', 'carts.total')
            ->sum('carts.total');
        $totalProductOrder = DB::table('orders')
            ->join('carts', 'orders.cart_id', 'carts.id')
            ->select('orders.*', 'carts.quantity')
            ->sum('carts.quantity');
        $countOrderPending = DB::table('orders')
            ->where('orders.pending', 1)
            ->count();
        $sumOrderPending = DB::table('orders')
            ->join('carts', 'orders.cart_id', 'carts.id')
            ->where('orders.pending', 1)
            ->select('orders.*', 'carts.total')
            ->sum('carts.total');
        $pendingProductOrder = DB::table('orders')
            ->join('carts', 'orders.cart_id', 'carts.id')
            ->where('orders.pending', 1)
            ->select('orders.*', 'carts.quantity')
            ->sum('carts.quantity');
        $countOrderProccess = DB::table('orders')
            ->where('orders.processing', 1)
            ->count();
        $sumOrderProccess = DB::table('orders')
            ->join('carts', 'orders.cart_id', 'carts.id')
            ->where('orders.processing', 1)
            ->select('orders.*', 'carts.total')
            ->sum('carts.total');
        $proccessProductOrder = DB::table('orders')
            ->join('carts', 'orders.cart_id', 'carts.id')
            ->where('orders.processing', 1)
            ->select('orders.*', 'carts.quantity')
            ->sum('carts.quantity');
        $countOrderDelivery = DB::table('orders')
            ->where('orders.delivery', 1)
            ->count();
        $sumOrderDelivery = DB::table('orders')
            ->join('carts', 'orders.cart_id', 'carts.id')
            ->where('orders.delivery', 1)
            ->select('orders.*', 'carts.total')
            ->sum('carts.total');
        $deliveryProduct = DB::table('orders')
            ->join('carts', 'orders.cart_id', 'carts.id')
            ->where('orders.delivery', 1)
            ->select('orders.*', 'carts.quantity')
            ->sum('carts.quantity');
        return view('admin/dashboard', compact(
            'deliveryProduct',
            'sumOrderDelivery',
            'countOrderDelivery',
            'proccessProductOrder',
            'sumOrderProccess',
            'countOrderProccess',
            'pendingProductOrder',
            'sumOrderPending',
            'countOrderPending',
            'totalProductOrder',
            'sumTotalOrder',
            'countOrder',
            'countUser',
            'countShop',
            'countPruduct',
            'countPruductPending',
            'countCate',
            'countSmallCate',
            'countBrand',
            'countShopPending'
        ));
    }
    public function update_commisssion(Request $req)
    {
        $comm = Commission::all()->first();
        if ($comm == '') {
            $comm = new Commission();
            $comm->commission = $req->commission;
            $comm->save();
        } else {
            $comm->commission = $req->commission;
            $comm->update();
        }
        return redirect()->route('admin_commission');
    }
    public function commisssion()
    {
        $comm = Commission::all()->first();
        $report = Report::all();
        $seller = sellers::all();
        if ($comm == '') {
            $commission = '';
        } else {
            $commission = $comm->commission;
        }
        return view('admin/product/commission', compact('commission', 'seller', 'report'));
    }
    public function user()
    {
        $users = DB::table('users')->where('type','user')->paginate(10);
        return view('admin/user/user', compact('users'));
    }
    public function deleteUser(Request $req)
    {
        $deleteuser = users::find($req->id);
        $deleteWishlist = Wishlist::where('u_id',$req->id)->get();
        $deleteOrder = orders::where('user_id',$req->id)->get();
        foreach($deleteWishlist as $item){
            $item->delete();
        }
        foreach($deleteOrder as $item){
            $item->delete();
        }
        $deleteuser->delete();
        return redirect()->back()->with('success','delete user successfully');
    }
    public function userDetail($id)
    {
        $user = users::find($id);
        return view('admin/user/userDetail', compact('user'));
    }
    public function shop()
    {
        $sellers = sellers::where('pending', '1')->paginate(5);
        $sellersCount = sellers::where('pending', '1')->count();
        $sellerspending = sellers::where('pending', '0')->count();
        return view('admin/seller/shop', compact('sellers', 'sellersCount', 'sellerspending'));
    }
    public function shop_pending()
    {
        $sellerReq = sellers::where('pending', '0')->get();
        $sellersCount = sellers::where('pending', '1')->count();
        $sellerspending = sellers::where('pending', '0')->count();
        return view('admin/seller/shopPending', compact('sellerReq', 'sellerspending', 'sellersCount'));
    }
    public function shop_detail($id)
    {
        $seller = sellers::find($id);
        return view('admin/seller/pendingDetail', compact('seller'));
    }

    public function shopConfirm(Request $request, $id)
    {
        $sellerCon = sellers::find($id);
        // $sellerCon = sellers::where('pending','0');
        $sellerCon->pending = 1;
        $sellerCon->update();
        $token = Str::random(60);
        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );
        Mail::send('forget.seller_accept_request', ['token' => $token], function ($message) use ($request) {
            $message->from($request->email);
            $message->to($request->email);
            $message->subject('Request Accepted');
        });
        return redirect('admin/shopPending')->with('success', 'Seller has been confirmed success');
    }
    public function seller_login($token)
    {
        DB::table('password_resets')->where(['token' => $token])->delete();
        return redirect()->route('login_page');
    }
    public function deleteSeller(Request $r)
    {
        $deleteseller = sellers::find($r->id);
        $deleteproduct = products::where('seller_id',$r->id)->get();
        foreach($deleteproduct as $item){
            $Productseller= products::find($item->id);
            $Productseller->delete();
        }
        $deleteseller->delete();
        return redirect()->back()->with('success','delete seller successfully');
    }
    public function seller_edit_register($token)
    {
        $emails = DB::table('password_resets')->where('token', $token)->first();
        $seller = sellers::where('email', $emails->email)->first();
        return view('admin/seller/editRegister', compact('seller'), ['token' => $token]);
    }

    public function seller_update_register(Request $reg, $token)
    {

        $register = sellers::where('email', $reg->email)->first();
        $this->validate($reg, [
            'store_name' => 'required',
            // 'email' => 'required|email|max:70|unique:sellers',
            // 'phone' => 'required|min:9|unique:sellers',
            'address' => 'required',
            'password' => 'required|min:8',
            'con_password' => 'required|min:8|same:password',
        ]);

        $register['password'] = Hash::make($register['password']);
        unset($register['con_password']);

        if ($reg->hasfile('img1')) {
            $file = $reg->file('img1');
            $filename = uniqid() . $file->getClientOriginalExtension();
            $file->move(public_path() . '/images/sellerImg1/', $filename);
            $register->img1 = $filename;
        }
        if ($reg->hasfile('img2')) {
            $file = $reg->file('img2');
            $filename = uniqid() . $file->getClientOriginalExtension();
            $file->move(public_path() . '/images/sellerImg2/', $filename);
            $register->img2 = $filename;
        }

        $register->store_name =  $reg->store_name;
        $register->address =  $reg->address;
        $register->pending = 0;
        $register->update();

        DB::table('password_resets')->where(['email' => $reg->email])->delete();

        return view('seller/register')->with('successMsg', 'Request register seller account Successfully, please wait until we send message to you by email');
    }
    public function shopReject(Request $request, $id)
    {
        $shopRej = sellers::find($id);
        $shopRej->pending = 2;
        $shopRej->update();

        $Admin_message = $request->message;

        // $message = request()->validate([
        //     'message'=>'required',
        // ]);
        $admin_send_meg = $Admin_message;
        $token = Str::random(60);
        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );
        Mail::send('forget.sellerRejectmsg', ['token' => $token, 'admin_send_meg' => $admin_send_meg], function ($message) use ($request) {
            $message->from($request->email);
            $message->to($request->email);
            $message->subject('Request Rejected');
        });
        return redirect('admin/shopPending')->with('danger', 'Seller has been Rejected');
    }

    public function sellerDetail($id)
    {
        $sellerHasProductCount = DB::table('products')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('sellers.id', $id)
            ->where('products.completed', '=', '1')
            ->count();
        $sellerHasProduct = DB::table('products')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('sellers.id', $id)
            ->where('products.completed', '=', '1')
            ->select('products.*', 'sellers.store_name', 'sellers.phone', 'sellers.address')->paginate(8);
        $seller = sellers::find($id);
        return view('admin/seller/sellerDetail', compact('seller', 'sellerHasProduct', 'sellerHasProductCount'));
    }

    public function sellerSale($id)
    {
        $seller = sellers::find($id);
        $report = Report::join('products','products.id','=','reports.pro_id')->where('reports.seller_id',$id)->paginate(7);

        return view('admin/sale', compact('seller','report'));
    }
    public function brand()
    {
        $result = DB::table('products')
            ->select(DB::raw('count(count) as total_pro'), 'brand_id')
            ->groupBy('brand_id')
            ->get();
        $brands = DB::table('brands')->get();
        // $brands = DB::table('brands')->paginate(5);
        return view('/admin/brand/brand', compact('brands', 'result'));
    }
    public function brandItem($id)
    {
        $brand = brands::find($id);
        $product = DB::table('products')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->join('sellers', 'products.seller_id', 'sellers.id')
            ->where('brands.id', $id)
            ->get();
        return view('/admin/brand/brandListItem', compact('product', 'brand'));
    }
    public function addBrand()
    {
        return view('admin/brand/addBrand');
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
        return redirect('/admin/brand')->with('brand_add', 'Brand has been add sucessfully');
    }

    public function category()
    {
        $categories = DB::table('categories')->paginate(5);
        $cate = categories::all();
        return view('admin/category/category', compact('categories', 'cate'));
    }
    public function addCategory()
    {
        return view('admin/category/addcategory');
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
        return redirect('admin/category')->with('cate_add', 'Category has been add sucessfully');
    }

    public function secondaryCategory()
    {
        $category = categories::all();
        $seCategory = DB::table('se_categories')->paginate(5);
        $second_cate = DB::table('se_categories')->get();
        return view('admin/2ndCategory/secondaryCategory', compact('category', 'seCategory', 'second_cate'));
    }
    public function addSecondaryCategory()
    {
        $data_category = categories::all();
        return view('admin/2ndCategory/addsecondarycategory', compact('data_category'));
    }
    public function storeSecondCategory(Request $req)
    {
        $var = new s_cat();
        $var->category_id = $req->id;
        $var->name = $req->name;

        if ($req->hasFile('secondarycategory_img')) {
            $file = $req->file('secondarycategory_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/secondCategory', $filename);
            $var->secondarycategory_img = $filename;
        } else {
            return $req;
            $var->secondarycategory_img = '';
            echo "Error";
        }
        $var->save();

        return redirect('/admin/secondary-category')->with('2ndCate_add', 'SecondaryCategory has been add sucessfully');
    }

    public function product()
    {
        $count = products::count();
        $pro = products::orderBy('created_at', 'desc')
            ->join('brands', 'products.brand_id', '=',  'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name')
            ->where('products.completed', '=', '1')
            ->paginate(5);
        $proCount = products::orderBy('created_at', 'desc')
            ->where('products.completed', '=', '1')
            ->count();
        $proPCount = products::orderBy('created_at', 'desc')
            ->where('products.completed', '=', '0')
            ->count();
        return view('admin/product/product', compact('pro', 'count', 'proCount', 'proPCount'));
    }

    public function productRequest()
    {
        $count = products::count();
        $pro = products::join('brands', 'products.brand_id', '=',  'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name')
            ->where('products.completed', '=', '0')
            ->where('products.admin_reject', '=', '0')
            ->paginate(5);
        $proCount = products::orderBy('created_at', 'desc')
            ->where('products.completed', '=', '1')
            ->count();
        $proPCount = products::orderBy('created_at', 'desc')
            ->where('products.completed', '=', '0')
            ->count();
        return view('admin/productRequest/productRequest', compact('pro', 'count', 'proCount', 'proPCount'));
    }

    public function productDetail($id)
    {
        $detail_pro = products::join('brands', 'products.brand_id', '=',  'brands.id')
            ->join('se_categories', 'products.s_cat_id', '=', 'se_categories.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('products.id', $id)
            ->where('products.completed', '=', '1')
            ->select('products.*','products.id as pro_id', 'categories.name as cat_name', 'brands.name as brand_name', 'sellers.address', 'sellers.store_name', 'se_categories.name as secondCate')
            ->get();
        return view('admin/product/show', compact('detail_pro'));
    }
    public function edit($id)
    {
        if (session()->has('seller')) {
            $data_seller = sellers::findOrFail(session('seller'));
            $pros = products::join('brands', 'products.brand_id', '=',  'brands.id')
                ->join('se_categories', 'products.s_cat_id', '=', 'se_categories.id')
                ->where('products.id', $id)
                ->where('products.seller_id', $data_seller->id)
                ->select('products.*', 'se_categories.name as cat_name', 'brands.name as brand_name')
                ->get();
            $brands = DB::table('brands')->get();
            $cats = DB::table('se_categories')->get();
            return view('seller/product/edit', compact('data_seller', 'pros', 'brands', 'cats'));
        }
        return view('/seller/login');
    }

    public function delete_brand(Request $req)
    {
        $brand_id = $req->input('delete_brand_id');
        $brand = brands::find($brand_id);
        $product = products::where('brand_id', $brand_id);
        // foreach ($product as $item) {
        //     $imgaes = json_decode($item->img_product);
        //     foreach ($imgaes as $file) {
        //         unlink(public_path("images/imgProduct/") . $file);
        //     }
        // }
        $product->delete();
        $brand->delete();
        return redirect()->back()->with('delete-success', 'Product has been delete successfully');
    }
    public function delete(Request $req)
    {
        $product_id = $req->input('delete_product_id');
        $product = products::find($product_id);
        // $imgaes = json_decode($product->img_product);
        // foreach ($imgaes as $file) {
        //     unlink(public_path("images/imgProduct/") . $file);
        // }
        $product->delete();
        return redirect()->back()->with('delete-success', 'Product has been delete successfully');
    }
    public function delete_se_cate(Request $req)
    {
        $se_cate_id = $req->input('delete_se_cate_id');
        $se_cate = se_categories::find($se_cate_id);
        $product = products::where('s_cat_id', $se_cate_id);
        // foreach ($product as $item) {
        //     $imgaes = json_decode($item->img_product);
        //     foreach ($imgaes as $file) {
        //         unlink(public_path("images/imgProduct/") . $file);
        //     }
        // }
        $se_cate->delete();
        $product->delete();
        return redirect()->back()->with('delete-se-cate', 'secondary category has been delete successfully');
    }
    public function delete_cat(Request $req)
    {
        $cat_id = $req->input('delete_category_id');
        $cat = categories::find($cat_id);
        $se_cate = se_categories::where('category_id', $cat_id);
        $product = products::where('category_id', $cat_id);
        // foreach ($product as $item) {
        //     $imgaes = json_decode($item->img_product);
        //     foreach ($imgaes as $file) {
        //         unlink(public_path("images/imgProduct/") . $file);
        //     }
        // }
        $se_cate->delete();
        $cat->delete();
        $product->delete();
        return redirect()->back()->with('delete-success', 'Product has been delete successfully');
    }

    public function sendMsg(Request $req)
    {
        $msg = new messages();
        $msg->msg = $req->msg;
        $msg->seller_id = $req->input('seller_id');
        $msg->sent = $req->input('sent');
        $msg->pro_id = $req->input('pro_id');
        $msg->save();
        return redirect('admin/product');
    }

    public function productRequestDetail($id)
    {
        $detail_pro = products::join('brands', 'products.brand_id', '=',  'brands.id')
            ->join('se_categories', 'products.s_cat_id', '=', 'se_categories.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('products.id', $id)
            ->where('products.completed', '=', '0')
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name', 'sellers.address', 'sellers.store_name', 'se_categories.name as secondCate')
            ->get();
        return view('admin/productRequest/productRequestDetail', compact('detail_pro'));
    }

    public function productRequestUpdate($id)
    {
        $product = products::find($id);
        $product->completed = 1;
        $product->update();
        return redirect('/admin/productRequest')->with('confirm_request', 'Product Confirm! ');
    }
    public function province()
    {
        $provinces = DB::table('provinces')
            ->orderByDesc('created_at')
            ->get();
        return view('admin/province/province', compact('provinces'));
    }
    public function addProvince(Request $req)
    {
        $this->validate($req, [
            'province' => 'required|max:26'
        ]);
        $province = new Province();
        $province->province = $req->province;
        $province->save();
        return redirect()->back()->with('success', 'Added new province successfully');
    }
    public function addTNC_user()
    {
        $getTNC = DB::table('term_n_condition')->where('type','user')->orderBy('created_at','asc')->get();
        // $getTNCseller = DB::select('select * from term_n_condition where type=seller');
        $getTNCseller = DB::table('term_n_condition')->where('type','seller')->orderBy('created_at','asc')->get();
        $countTNCseller= TNC::where('type','seller')->count();
        $countTNC = TNC::where('type','user')->count();
        return view('admin\termAndCondition\addTermAndCondition',compact('getTNC','getTNCseller','countTNC','countTNCseller'));
    }
    public function addTNC_seller()
    {
        $getTNC = DB::table('term_n_condition')->where('type','seller')->orderBy('created_at','asc')->get();
        // $getTNCseller = DB::select('select * from term_n_condition where type=seller');
        $getTNCseller = DB::table('term_n_condition')->where('type','seller')->get();
        $countTNCseller= TNC::where('type','seller')->count();
        $countTNC = TNC::where('type','user')->count();
        return  view('admin\termAndCondition\AddTncSeller',compact('getTNC','getTNCseller','countTNC','countTNCseller'));
    }
    public function TNC()
    {
        $getTNC = DB::table('term_n_condition')->where('type','user')->orderBy('created_at','asc')->get();
        // $getTNCseller = DB::select('select * from term_n_condition where type=seller');
        $getTNCseller = DB::table('term_n_condition')->where('type','seller')->orderBy('created_at','asc')->get();
        // $getTitleseller = DB::table('term_n_condition')->get();
        // $countTNC = term_n_condition::where('type','user')->count();
        $countTNCseller= TNC::where('type','seller')->count();
        $countTNC = TNC::where('type','user')->count();

        return view('admin\termAndCondition\addTermAndCondition',compact('getTNC','getTNCseller','countTNC','countTNCseller'));
    }
    public function addtitleUser(Request $request)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        // ]);
        $titleseller= new TNC();
        $titleseller->text = $request->description;
        $titleseller->title=$request->title;
        $titleseller->type='user';
        $titleseller->save();
        return redirect()->back()->with('success', 'Added Term And Condition for user successfully');
    }
    public function edit_t_n_c($id){
        $getTNC = DB::table('term_n_condition')->where('id',$id)->first();
        return view('admin\termAndCondition\editTNC',compact('getTNC'));
    }
    public function update_TNC(Request $req){
        $getTNC = TNC::find($req->id);

        $getTNC->title = $req->title;
        $getTNC->text = $req->description;

        $getTNC->update();
        // return redirect()->back()->with('success', 'Added new title to users Term And Condition successfully');
        if($getTNC->type=='user'){
            return redirect()->route('TNC');

        }else{
            return redirect()->route('seller_term_con');
        }
    }
    public function addTNC(Request $request)
    {
        $request->validate([
            'TNC'=>'required'
        ]);
        $tnc= new TNC();
        $tnc->text=$request->TNC;
        $tnc->title=$request->title;
        $tnc->type='user';
        $tnc->save();
        return redirect()->back()->with('success', 'Added new Term And Condition to users successfully');
    }
    public function addTNCseller(Request $request)
    {
        $titleseller= new TNC();
        $titleseller->title=$request->title;
        $titleseller->text = $request->description;
        $titleseller->type='seller';
        $titleseller->save();
        return redirect()->back()->with('success', 'Added Term And Condition for seller successfully');
    }
    public function delete_term_condition($id){
        $tn = TNC::find($id);

        $tn->delete();

        return redirect()->back()->with('success', 'Deleted successfully');

    }

}