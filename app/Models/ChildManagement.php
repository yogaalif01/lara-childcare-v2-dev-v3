<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildManagement extends Model
{
    use HasFactory;
    protected $table = 'child_management';
    protected $primaryKey = 'id_childManagement';
    public $timestamps = false;
}
