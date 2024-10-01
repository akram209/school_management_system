<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacherattendence extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id', 'date', 'status'];
    public function student()
    {
        return $this->belongsTo(Teacherattendence::class);
    }
}
