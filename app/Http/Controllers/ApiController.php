<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Agent;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function index(){

        // $data = Storage::disk('local')->get('dataJson.json');

        // $data = json_decode($data, true);

        // return $data;






        $data = DB::table('agents')
        // ->get();
        ->paginate(6);

        return $data;








        // for($i =1; $i <=100 ; $i++){
        //     $data = new Agent();

        //     $data->agent_name="name$i";
        //     $data->save();
        // }
        // return "done";
    }
}
