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
        return $this->hasMany(Student::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function timeTable()
    {
        return $this->hasMany(Timetable::class);
    }

    public function exam()
    {
        return $this->hasMany(Exam::class);
    }

    public function grade()
    {
        return $this->hasMany(Grade::class);
    }
}
