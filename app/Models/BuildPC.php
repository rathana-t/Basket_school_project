<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildPC extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "buildpc";

    protected $fillable=['total','user_id','product_id','created_at','updated_at'];
}