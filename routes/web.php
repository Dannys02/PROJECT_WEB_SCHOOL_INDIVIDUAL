<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AboutSchoolController;

// Public Routes
Route::get('/', [PublicController::class, 'index'])->name('home');

//Auth Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Dashboard Route
Route::middleware('auth')->group(function () {
    // Settings
    Route::get('/admin/settings', [AuthController::class, 'showSettings'])->name('admin.settings');
    Route::put('/admin/settings', [AuthController::class, 'updateSettings'])->name('admin.settings.update');
    //Admin Dashboard
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

    //Admin Students
    Route::resource('admin/students', StudentController::class, ['names' => [
        'index' => 'admin.students.index',
        'create' => 'admin.students.create',
        'store' => 'admin.students.store',
        'show' => 'admin.students.show',
        'edit' => 'admin.students.edit',
        'update' => 'admin.students.update',
        'destroy' => 'admin.students.destroy',
    ]]);

    //Admin Teachers
    Route::resource('admin/teachers', TeacherController::class, ['names' => [
        'index' => 'admin.teachers.index',
        'create' => 'admin.teachers.create',
        'store' => 'admin.teachers.store',
        'show' => 'admin.teachers.show',
        'edit' => 'admin.teachers.edit',
        'update' => 'admin.teachers.update',
        'destroy' => 'admin.teachers.destroy',
    ]]);

    //Admin Majors
    Route::resource('admin/majors', MajorController::class, ['names' => [
        'index' => 'admin.majors.index',
        'create' => 'admin.majors.create',
        'store' => 'admin.majors.store',
        'show' => 'admin.majors.show',
        'edit' => 'admin.majors.edit',
        'update' => 'admin.majors.update',
        'destroy' => 'admin.majors.destroy',
    ]]);

    //Admin Positions
    Route::resource('admin/positions', PositionController::class, ['names' => [
        'index' => 'admin.positions.index',
        'create' => 'admin.positions.create',
        'store' => 'admin.positions.store',
        'show' => 'admin.positions.show',
        'edit' => 'admin.positions.edit',
        'update' => 'admin.positions.update',
        'destroy' => 'admin.positions.destroy',
    ]]);

    //Admin Articles
    Route::resource('admin/articles', ArticleController::class, ['names' => [
        'index' => 'admin.articles.index',
        'create' => 'admin.articles.create',
        'store' => 'admin.articles.store',
        'show' => 'admin.articles.show',
        'edit' => 'admin.articles.edit',
        'update' => 'admin.articles.update',
        'destroy' => 'admin.articles.destroy',
    ]]);

    //Admin About School
    Route::resource('admin/about-school', AboutSchoolController::class, ['names' => [
        'index' => 'admin.about-school.index',
        'create' => 'admin.about-school.create',
        'store' => 'admin.about-school.store',
        'show' => 'admin.about-school.show',
        'edit' => 'admin.about-school.edit',
        'update' => 'admin.about-school.update',
        'destroy' => 'admin.about-school.destroy',
    ]]);
});
