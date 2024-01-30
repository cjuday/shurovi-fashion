<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'img', 'title', 'title_2', 'title_3', 'title_4', 'visiblity', 'text_align', 'uploaded_by'
    ];
}
