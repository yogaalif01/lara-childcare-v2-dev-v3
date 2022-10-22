<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataEmployee extends Model
{
    use HasFactory;
    protected $table = 'biodataemployee';
    protected $primaryKey = 'id_biodataEmployee';
    public $timestamps = false;
}
