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
        // $latestStudents = Student::latest()->limit(5)->get();
        // $latestTeachers = Teacher::latest()->limit(5)->get();

        $latestStudents = Student::latest()->take(5)->get()->map(function ($student) {
            $student->type = 'student';
            return $student;
        });

        $latestTeachers = Teacher::latest()->take(5)->get()->map(function ($teacher) {
            $teacher->type = 'teacher';
            return $teacher;
        });

        $latestUsers = $latestStudents
            ->concat($latestTeachers)
            ->sortByDesc('created_at')
            ->take(10);

        $latestArticles = Article::latest()->limit(5)->get();

        return view('admin.dashboard', [
            'totalStudents' => $totalStudents,
            'totalTeachers' => $totalTeachers,
            'totalMajors' => $totalMajors,
            'totalArticles' => $totalArticles,
            'latestStudents' => $latestStudents,
            'latestTeachers' => $latestTeachers,
            'latestUsers' => $latestUsers,
            'latestArticles' => $latestArticles,
        ]);
    }
}
