<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sellers extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "sellers";

    protected $fillable=['store_name','email','phone','address','password','profile','count','created_at','updated_at'];
}
