<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildImprovment extends Model
{
    use HasFactory;
    protected $table = 'childimprovement';
    protected $primaryKey = 'id_childImprovement';
    public $timestamps = false;
}
