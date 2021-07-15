<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_has_cards extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "users_has_cards";

    protected $fillable=['user_id','card_id','count','created_at','updated_at'];
}
