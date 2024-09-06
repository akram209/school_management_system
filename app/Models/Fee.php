<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeModel extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'status'];

    public function student(){
        return $this->belongsTo(student::class);
}
}
