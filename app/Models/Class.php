<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $fillable =[
      'name'
    ];
    public function students(){
      return $this->hasMany(Student::class);
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }

    public function timeTable(){
        return $this->hasMany(Timetable::class,'class_id','id');
    }

    public function exam(){
        return $this->hasMany(Exam::class,'class_id','id');
    }

    public function grade(){
        return $this->hasMany(Grade::class,'class_id','id');
    }

    

}
