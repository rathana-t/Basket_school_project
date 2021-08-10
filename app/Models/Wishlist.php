<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "wishlist";

    protected $fillable=['u_is','pro_id','created_at','updated_at'];
}