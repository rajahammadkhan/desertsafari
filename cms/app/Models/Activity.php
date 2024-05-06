<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['activity_type', 'name', 'price','status'];

    protected $connection = "web";

    protected $table = "activity";

    public function features(){
        return $this->hasMany('App\Models\ActivityPrice','activity_id','id');
    }

    public function images(){
        return $this->hasMany('App\Models\ActivityGalleryImage','activity_id','id');
    }
}
