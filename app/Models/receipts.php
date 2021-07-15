<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipts extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "receipts";

    protected $fillable=['status','location','order_id','user_id','cart_id','count','created_at','updated_at'];
}
