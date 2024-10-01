<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAttendence extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id', 'date', 'status'];
    public function teacher()
    {
        return $this->belongsTo(TeacherAttendence::class);
    }
}
