<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reworks extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug','status'];
    protected $connection = "web";

    protected $table = "reworks";
}
