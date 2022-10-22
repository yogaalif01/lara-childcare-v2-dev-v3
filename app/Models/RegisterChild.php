<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterChild extends Model
{
    use HasFactory;
    protected $table = 'biodatachild';
    protected $primaryKey = 'id_biodataChild';
    public $timestamps = false;
}
