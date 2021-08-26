<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = "comment";

    protected $fillable=['user_id','pro_id','comment','created_at','updated_at'];
}