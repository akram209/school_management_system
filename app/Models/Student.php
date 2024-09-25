<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Class;


class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'class_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
    public function attendence()
    {
        return $this->hasMany(Attendence::class);
    }
    public function fee()
    {
        return $this->hasOne(Fee::class);
    }
    public function parents()
    {

        return $this->belongsToMany(ParentModel::class, 'parent_student', 'student_id', 'parent_id');
    }
    public function assignments()
    {
        return $this->belongsToMany(Assignment::class, 'assignment_student', 'student_id', 'assignment_id')->withPivot('score');
    }
    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_student', 'student_id', 'exam_id')->withPivot('score');
    }
}
