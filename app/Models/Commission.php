<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "commissions";

    protected $fillable=['commission','created_at','updated_at'];
}
