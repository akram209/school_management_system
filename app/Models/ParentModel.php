<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'phone', 'address'];
    protected $table = 'parents';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'parent_student', 'parent_id', 'student_id');
    }
}
