<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry_Prodoct extends Model
{
    use HasFactory;
    protected $table = "enquiry_product";
    protected $connection = "web";
}
