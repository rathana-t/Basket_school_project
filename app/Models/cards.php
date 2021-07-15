<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cards extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "cards";

    protected $fillable=['name','number','expire_date','cvv','count','created_at','updated_at'];
}
