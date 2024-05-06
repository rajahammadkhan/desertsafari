<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $connection = "web";
    protected $table = "products";
    protected $fillable = [
        'name',
        'price',
        'sku',
        'brand_id', 
        'brand_name', 
        'brand_size', 
        'chart_size', 
        'category', 
        'category_id', 
        'weight',
        'condition',
        'colors',
        'size',
        'descriptions',
        'additional_info',
        'shipping',
        'thumbnail',
        'product_images',
        'in_stock',
        'slug',
        'size_qty',
        'fabric',
        'meta_title',
        'meta_keyword',
        'meta_des',
        'keyword',
        'status',
        'is_new_arrival',
        'is_polular',
        'is_best_selling',
        'published',
         ];
}
