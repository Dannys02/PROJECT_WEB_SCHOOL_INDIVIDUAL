<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSchool extends Model
{
    protected $table = 'about_schools';
    protected $fillable = ['school_name', 'logo_school', 'about_school'];
}
