<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];




    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function timeTables()
    {
        return $this->hasMany(Timetable::class);
    }
    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'class_subject_teacher', 'subject_id', 'class_id')->withPivot('teacher_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'class_subject_teacher', 'subject_id', 'teacher_id')->withPivot('class_id');
    }
}
