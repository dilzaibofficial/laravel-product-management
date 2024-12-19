<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // Define fillable attributes for mass assignment
    protected $fillable = [
        'name',        // Product name
        'description', // Product description
        'price',       // Product price
        'image',       // Image file name
    ];
}
