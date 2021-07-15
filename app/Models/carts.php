<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "carts";

    protected $fillable=['quantity','total','user_id','product_id','count','created_at','updated_at'];
}
