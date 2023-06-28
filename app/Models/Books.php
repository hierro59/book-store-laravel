<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\BooksFactory;

class Books extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'autor',
        'coautores',
        'detail',
        'publish_date',
        'isbn',
        'language',
        'price',
        'discount',
        'slug',
        'status',
        'categorie',
        'file_path',
        'created_by'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
}