<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "users";

    protected $fillable=['username','phone','password','profile','address','count','created_at','updated_at'];
}
