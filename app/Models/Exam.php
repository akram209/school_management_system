<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = ['subject_id', 'class_id'];

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function class(){
        return $this->belongsTo(ClassModel::class,'class_id','id');
    }
}
