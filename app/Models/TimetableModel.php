<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimetableModel extends Model
{
    use HasFactory;
    protected $fillable = ['
        class_id'
    , 'subject_id'
    , 'teacher_id'
    , 'date'
    , 'day_name'
    ,'start_time'
    , 'end_time'];
}
