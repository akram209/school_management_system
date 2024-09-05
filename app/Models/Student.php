<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'class_id',
        'parent_id',
        'gender',
        'image',
        ];
}
