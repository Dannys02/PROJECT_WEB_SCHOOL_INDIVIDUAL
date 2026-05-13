<?php

namespace App\Http\Controllers;

use App\Models\AboutSchool;
use App\Models\Article;
use App\Models\Teacher;
use App\Models\Major;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display the landing page / welcome page
     */
    public function index()
    {
        // Get school information
        $schoolInfo = AboutSchool::first();

        // Get featured majors (latest 6)
        $majors = Major::take(6)->get();

        // Get featured teachers (latest 8)
        $teachers = Teacher::with(['major', 'position'])->take(8)->get();

        // Get latest articles (6)
        $articles = Article::with('major')->latest()->take(6)->get();

        // Get total counts for statistics
        $stats = [
            'majors' => Major::count(),
            'teachers' => Teacher::count(),
            'articles' => Article::count(),
        ];

        return view('welcome', compact('schoolInfo', 'majors', 'teachers', 'articles', 'stats'));
    }
}
