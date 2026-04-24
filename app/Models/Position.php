<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    protected $fillable = [
        'position',
    ];

    public function teachers() {
        return $this->hasMany(Teacher::class);
    }
}
