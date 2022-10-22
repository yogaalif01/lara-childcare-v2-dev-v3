<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaitingList extends Model
{
    use HasFactory;
    protected $table = 'waitinglist';
    protected $primaryKey = 'id_waitingList';
    public $timestamps = false;
}
