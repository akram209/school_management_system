<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Timetable extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'subject_id',
        'teacher_id',
        'day_name',
        'start_time',
        'end_time'
    ];
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
