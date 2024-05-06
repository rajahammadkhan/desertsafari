<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table = "activity";

    public function ActivityPrice(){
        return $this->hasMany('App\Models\ActivityPrice','activity_id','id');
    }

    public function gallery_images(){
        return $this->hasMany('App\Models\activity_gallery_images','activity_id','id');
    }
}
