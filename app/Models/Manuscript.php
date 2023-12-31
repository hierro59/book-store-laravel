<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manuscript extends Model
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
        'categorie',
        'sub_categorie',
        'status',
        'file_path',
        'deleted',
        'created_by'
    ];
}
