<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;
    protected $table = "visa";

    public function visaPrice(){
        return $this->hasMany('App\Models\VisaPrice','visa_id','id');
    }
}
