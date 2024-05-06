<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processing extends Model
{
    use HasFactory;
    protected $table = "processing";
    
    protected $fillable = [
        'order_number',
        'client_id',
        'client_name',
        'client_address',
        'client_country',
        'order_details',
        'product_name',
        'client_number',
        'client_alternate_number',
        'client_email',
        'client_shipaddress',
        'client_note',
        'discount_type',
        'discount_amount',
        'amount',
        'received_by',
        'order_status',
        'reason_cancel',
        'created_at',
        'updated_at',
    ];
}