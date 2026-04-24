<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'title',
        'major_id',
        'article',
        'image',
    ];

    public function majors() {
        return $this->belongsTo(Major::class);
    }
}
