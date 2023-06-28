<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyLibrary extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id', 
        'user_id',
        'transaction_id',
        'transaction_type',
        'created_at',
        'updated_at'
    ];
}
