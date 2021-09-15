<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadWord extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "bad_words";

    protected $fillable=['word','created_at','updated_at'];
}