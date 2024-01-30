<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTopImage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'src', 'updated_by'
    ];
}
