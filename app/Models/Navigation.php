<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    use HasFactory;
    protected $table = "navigation";

    public function children(){

        return $this->hasMany('App\Models\Navigation','parent_id','id');

    }
    public function parent(){

        return $this->hasOne('App\Models\Navigation','id','parent_id');

    }
}