<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subgroups extends Model
{
    use HasFactory;
  
  	protected $fillable = [
    	'name','created_by','group_id'
    ];
}
