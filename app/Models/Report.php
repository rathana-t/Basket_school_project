<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    use HasFactory;

    protected $table = "reports";


    public static function GetReportCommission($id){
        $data = DB::table('reports')->where('seller_id',$id)
        ->select('code_product','pro_name','pro_price','quantity_order','total_price','commission','commission_price')
        ->get()->toArray();

        return $data;
    }
    public static function GetReportOneSellerCommission($id){
        $data = DB::table('reports')->join('sellers','sellers.id','=','reports.seller_id')
        ->where('reports.seller_id',$id)
        ->select('sellers.id','sellers.store_name','reports.code_product','reports.pro_name','reports.pro_price','reports.quantity_order','reports.total_price','reports.commission','reports.commission_price')
        ->get()->toArray();

        return $data;
    }
    public static function GetReportAllSellerCommission(){
        $data = DB::table('reports')->join('sellers','sellers.id','=','reports.seller_id')
        ->select('sellers.id','sellers.store_name','reports.code_product','reports.pro_name','reports.pro_price','reports.quantity_order','reports.total_price','reports.commission','reports.commission_price')
        ->get()->toArray();

        return $data;
    }
}
