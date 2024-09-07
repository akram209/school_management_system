<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable =[
         'name'
    ];
    public function teacher(){
        return $this->hasMany(Teacher::class,'subject_id','id');
    }

    

    public function grade(){
        return $this->hasMany(Grade::class,'subject_id','id');
    }

    public function timeTable(){
        return $this->hasMany(Timetable::class,'subject_id','id');
    }


}
