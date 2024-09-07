<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
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
          public function student(){
            return $this->belongsTo(Student::class,'student_id','id');
          }

          public function subject(){
            return $this->belongsTo(Subject::class,'subject_id','id');
          }

          public function class(){
            return $this->belongsTo(ClassModel::class,'class_id','id');
          }

          public function exam(){
            return $this->belongsTo(Exam::class,'exam_id','id');
          }
        
}
