<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected  $fillable = [
        'subject_id',
        'class_id',
        'title',
        'description',
        'type',
        'mark',
        'deadline',
    ];
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'assignment_student', 'assignment_id', 'student_id')->withPivot('score', 'path');
    }
}
