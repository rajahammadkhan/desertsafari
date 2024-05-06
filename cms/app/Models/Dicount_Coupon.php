<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dicount_Coupon extends Model
{
    use HasFactory;

    // protected $fillable = ['coupon_code', 'coupon_price'];

    protected $connection = "web";

    protected $table = "discount_coupon";
}
