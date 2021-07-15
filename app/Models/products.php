<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "products";

    protected $fillable=['name','description','price','stock','top_buy','brand_id','category_id','seller_id','count','created_at','updated_at'];
}
