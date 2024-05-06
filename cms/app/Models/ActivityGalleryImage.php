<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityGalleryImage extends Model
{
    use HasFactory;
    protected $connection = "web";

    protected $table = "activity_gallery_images";
}
