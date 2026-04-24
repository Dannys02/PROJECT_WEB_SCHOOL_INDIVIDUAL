<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'name',
        'nisn',
        'gender',
        'address',
        'student_picture',
        'social_media',
    ];

    public function majors()
    {
        return $this->belongsTo(Major::class);
    }
}
