<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "brands";

    protected $fillable=['name','brand_img','count','created_at','updated_at'];

}