<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Class;


class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'class_id',
        'parent_id',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }
    public function attendence()
    {
        return $this->hasMany(Attendence::class);
    }
    public function fee()
    {
        return $this->hasOne(Fee::class);
    }
    public function parent()
    {
        return $this->belongsToMany(Parent::class);
    }
}
