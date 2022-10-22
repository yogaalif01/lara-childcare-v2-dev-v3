<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataParent extends Model
{
    use HasFactory;
    protected $table = 'biodataparent';
    protected $primaryKey = 'id_biodataParent';
    public $timestamps = false;
}
