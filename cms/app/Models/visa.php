<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visa extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price','status'];

    protected $connection = "web";

    protected $table = "visa";

    public function features(){
        return $this->hasMany('App\Models\VisaPrice','visa_id','id');
    }
}
