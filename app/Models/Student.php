<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'name',
        'major_id',
        'class',
        'nisn',
        'gender',
        'address',
        'student_picture',
        'social_media',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
