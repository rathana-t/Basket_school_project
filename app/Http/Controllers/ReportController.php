<?php

namespace App\Http\Controllers;

use App\Models\sellers;
use App\Exports\AdminExport;
use App\Exports\SellerExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdminExportOneSeller;


class ReportController extends Controller
{
    public function export_excel($id){

        // $data = DB::table('reports')
        // ->select('pro_name','pro_price','quantity_order','total_price','commission','commission_price')->where('seller_id',$id)
        // ->get()->toArray();
        return Excel::download(new  SellerExport($id), 'CommissionList.xlsx');
    }
    public function export_commission_allsellers(){

        // $data = DB::table('reports')->join('sellers','sellers.id','=','reports.seller_id')
        // ->select('sellers.id','sellers.store_name','reports.pro_name','reports.pro_price','reports.quantity_order','reports.total_price','reports.commission','reports.commission_price')->orderBy('sellers.id','asc')
        // ->get()->toArray();
        return Excel::download(new  AdminExport(), 'all_sellers_CommissionList.xlsx');
    }
    public function export_commission_one_seller($id){

        // $data = DB::table('reports')->join('sellers','sellers.id','=','reports.seller_id')
        // ->where('sellers.id',$id)
        // ->select('sellers.id','sellers.store_name','reports.pro_name','reports.pro_price','reports.quantity_order','reports.total_price','reports.commission','reports.commission_price')->orderBy('sellers.id','asc')
        // ->get()->toArray();
        return Excel::download(new  AdminExportOneSeller($id), 'all_sellers_CommissionList.xlsx');
    }
}
