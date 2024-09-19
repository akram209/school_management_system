<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'date', 'status'];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
