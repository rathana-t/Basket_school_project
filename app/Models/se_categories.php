<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class se_categories extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "se_categories";

    protected $fillable=['name','secondarycategory_img','category_id','created_at','updated_at'];
}
