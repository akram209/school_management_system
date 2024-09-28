<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'user_id',
        'subject_id',
        'phone',
        'address',
        'salary',
        'experience_years',
        'qualification',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function class()
    {
        return $this->belongsToMany(ClassModel::class, 'class_teacher', 'teacher_id', 'class_id');
    }

    public function timeTables()
    {
        return $this->hasMany(Timetable::class);
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'class_subject_teacher', 'teacher_id', 'subject_id')->withPivot('class_id');
    }

    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'class_subject_teacher', 'teacher_id', 'class_id')->withPivot('subject_id');
    }
}
