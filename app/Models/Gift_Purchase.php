<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift_Purchase extends Model
{
    use HasFactory;    
    protected $table = "gift_purchase";
    protected $fillable = [
        'user_id','card_id','sender_name','recipient_name', 'sender_email','recipient_email','message','delivery_date','price','template','sku_no','expiry_date'
    ];
}
