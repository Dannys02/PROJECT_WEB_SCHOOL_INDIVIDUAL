<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = [
        'name',
        'nip',
        'gender',
        'address',
        'teacher_picture',
        'position_id',
        'lessons',
        'social_media'
    ];

    public function majors() {
        return $this->belongsTo(Major::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
