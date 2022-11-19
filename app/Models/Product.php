<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'category_id',
        'product_name',
        'product_price',
        'short_description',
        'long_description',
        'product_code',
        'product_photo',
        'product_slug'

    ];
}
