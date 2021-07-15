<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "orders";

    protected $fillable=['cart_id','count','created_at','updated_at'];
}
