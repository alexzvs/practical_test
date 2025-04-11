<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Specify which attributes should be mass assignable
    protected $fillable = ['name', 'description', 'price', 'quantity'];

    // Specify which attributes should be cast to specific data types
    protected $casts = [
        'price' => 'float',
        'quantity' => 'integer',
    ];
}
