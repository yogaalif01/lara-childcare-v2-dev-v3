<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyHabbits extends Model
{
    use HasFactory;
    protected $table = 'dailyhabits';
    protected $primaryKey = 'id_dailyHabits';
    public $timestamps = false;
}
