<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProfile extends Model
{
    use HasFactory;
    protected $table = 'image_profile';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
