<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleChild extends Model
{
    use HasFactory;
    protected $table = 'schedulechild';
    protected $primaryKey = 'id_scheduleChild';
    public $timestamps = false;
}
