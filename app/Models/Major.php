<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = 'majors';
    protected $fillable = [
        'major_name',
        'major_logo',
        'major_about',
        'class',
        'student_id',
        'teacher_id',
    ];

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function teachers() {
        return $this->hasMany(Teacher::class);
    }

    public function articles() {
        return $this->hasMany(Article::class);
    }
}
