<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    protected $table = 'classes';
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }


    public function timeTable()
    {
        return $this->hasMany(Timetable::class, 'class_id');
    }

    public function exam()
    {
        return $this->hasMany(Exam::class, 'class_id');
    }

    public function grade()
    {
        return $this->hasMany(Grade::class, 'class_id');
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'class_subject_teacher', 'class_id', 'subject_id')->withPivot('teacher_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'class_subject_teacher', 'class_id', 'teacher_id')->withPivot('subject_id');
    }
}
