<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Parent extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'phone', 'address', 'gender', 'image'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function student(){
        return $this->belongsToMany(Student::class);
}
}
