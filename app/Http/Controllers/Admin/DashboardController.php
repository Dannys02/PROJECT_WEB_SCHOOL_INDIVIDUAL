<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Major;
use App\Models\Article;

class DashboardController extends Controller
{
    public function index()
    {
        // Get statistics
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalMajors = Major::count();
        $totalArticles = Article::count();

        // Get latest data (5 records each)
        $latestStudents = Student::latest()->limit(5)->get();
        $latestArticles = Article::latest()->limit(5)->get();

        return view('admin.dashboard', [
            'totalStudents' => $totalStudents,
            'totalTeachers' => $totalTeachers,
            'totalMajors' => $totalMajors,
            'totalArticles' => $totalArticles,
            'latestStudents' => $latestStudents,
            'latestArticles' => $latestArticles,
        ]);
    }
}
