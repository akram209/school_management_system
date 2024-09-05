<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    use HasFactory;
    protected $fillable =
    [    'user_id',
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
}
