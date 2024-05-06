<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Activity;
use App\Models\Visa;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'activity_id',
        'visa_id',
        'product',
        'quantity',
        'activity_packages',
        'user_id',
        'activity_transfer',
        'activity_travel_date',
        'activity_adult_price',
        'activity_child_price',
        'activity_infant_price',
        'activity_total_amount',
        'visa_packages',
        'visa_processing_type',
        'visa_number',
        'visa_travel_date',
        'visa_total_amount',
    ];
    protected $table = "carts";

    /**
     * Relation with product
     */

    public function product()
    {
        return $this-> hasMany(Product::class, 'id', 'product_id');
    }

    public function activity()
    {
        return $this-> hasMany(Activity::class, 'id', 'activity_id');
    }

    public function visa()
    {
        return $this-> hasMany(Visa::class, 'id', 'visa_id');
    }
}
