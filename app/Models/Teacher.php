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
        'gender',
        'salary',
        'experience_years',
        'qualification',
        'image',
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
        return $this->belongsToMany(ClassModel::class);
    }

    public function timeTable()
    {
        return $this->hasMany(Timetable::class);
    }
}
