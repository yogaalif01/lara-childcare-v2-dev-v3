<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nanny extends Model
{
    use HasFactory;
    protected $table = 'nanny';
    protected $primaryKey = 'id_nanny';
    public $timestamps = false;
}
