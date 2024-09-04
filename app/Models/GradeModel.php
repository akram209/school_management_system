<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 
        'subject_id', 
        'grade',
        'mark',
        'class_id',
        'exam_id',
        'full_mark',
          ];
}
