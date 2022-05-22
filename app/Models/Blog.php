<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    // public $timestamps = false;

    public $fillable = ['title', 'content', 'user_id', 'image'];
}
