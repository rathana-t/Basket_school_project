<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TNC extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = "term_n_condition";
    
    protected $fillable = [];
}
