<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','activity_id','quantity','user_id'];
    protected $table = "wishlist";

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
}
