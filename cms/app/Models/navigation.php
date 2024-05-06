<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class navigation extends Model
{
    use HasFactory;

    protected $table = "navigation";
    protected $connection = "web";

    public function children(){

        return $this->hasMany('App\Models\navigation','parent_id','id');

    }
    public function parent(){

        return $this->hasOne('App\Models\navigation','id','parent_id');

    }
}
