<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildActivity extends Model
{
    use HasFactory;
    protected $table = 'childactivity';
    protected $primaryKey = 'id_childActivity';
    public $timestamps = false;
}
