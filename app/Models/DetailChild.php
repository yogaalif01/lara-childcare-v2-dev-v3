<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailChild extends Model
{
    use HasFactory;
    protected $table = 'detailchild';
    protected $primaryKey = 'id_childActivity';
    public $timestamps = false;
}
