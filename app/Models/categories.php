<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "categories";

    protected $fillable=['name','count','category_img','created_at','updated_at'];
}
