<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'class_id',
        'start_time',
        'end_time',
        'date',
        'type',
        'title',
        'description',


    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'exam_student', 'exam_id', 'student_id')->withPivot('score');
    }
}
