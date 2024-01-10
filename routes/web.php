<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\LecturerController;

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExamController;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuestionController;

use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/about', fn () => Inertia::render('About'))->name('about');


    // Route::resource('users', UserController::class);



    // Route::resource('courses', CourseController::class);
    
    Route::resource('exams', ExamController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => 'superadmin'], function(){
    Route::get('superadmin/dashboard',[DashboardController::class, 'dashboard'])->name('superadmin.dashboard');
    Route::get('superadmin/users/index', [UserController::class, 'index'])->name('superadmin.users.index');
    Route::get('superadmin/users/create', [UserController::class, 'create'])->name('superadmin.users.create');
    Route::post('superadmin/users/create', [UserController::class, 'store'])->name('superadmin.users.store');
    Route::get('superadmin/users/edit/{id}', [UserController::class, 'edit'])->name('superadmin.users.edit');
    Route::patch('superadmin/users/edit/{id}', [UserController::class, 'update'])->name('superadmin.users.update');
    Route::delete('superadmin/users/destroy/{id}', [UserController::class, 'destroy'])->name('superadmin.users.destroy');
});

Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    // Users Routes
    Route::get('admin/users/index', [AdminController::class, 'indexUser'])->name('admin.users.index');
    Route::get('admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('admin/admins/create', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('admin/users/edit/{id}', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::patch('admin/users/edit/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('admin/users/destroy/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

    // Courses Routes
    Route::get('admin/courses/index', [CourseController::class, 'index'])->name('admin.courses.index');
    Route::get('admin/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
    Route::post('admin/courses/create', [CourseController::class, 'store'])->name('admin.courses.store');
    Route::get('admin/courses/edit/{id}', [CourseController::class, 'edit'])->name('admin.courses.edit');
    Route::patch('admin/courses/edit/{id}', [CourseController::class, 'update'])->name('admin.courses.update');
    Route::delete('admin/courses/destroy/{id}', [CourseController::class, 'destroy'])->name('admin.courses.destroy');

    // Exams Routes
    Route::get('admin/exams/index', [ExamController::class, 'index'])->name('admin.exams.index');
    Route::get('admin/exams/create', [ExamController::class, 'create'])->name('admin.exams.create');
    Route::post('admin/exams/create', [ExamController::class, 'store'])->name('admin.exams.store');
    Route::get('admin/exams/edit/{id}', [ExamController::class, 'edit'])->name('admin.exams.edit');
    Route::patch('admin/exams/edit/{id}', [ExamController::class, 'update'])->name('admin.exams.update');
    Route::delete('admin/exams/destroy/{id}', [ExamController::class, 'destroy'])->name('admin.exams.destroy');


    Route::get('admin/classrooms/index', [ClassroomController::class, 'index'])->name('admin.classrooms.index');
});

Route::group(['middleware' => 'lecturer'], function(){
    Route::get('lecturer/dashboard', [DashboardController::class, 'dashboard'])->name('lecturer.dashboard');

    // Questions Routes
    Route::get('lecturer/questions/index', [QuestionController::class, 'index'])->name('lecturer.questions.index');
    Route::get('lecturer/questions/create', [QuestionController::class, 'create'])->name('lecturer.questions.create');
    Route::post('lecturer/questions/create', [QuestionController::class, 'store'])->name('lecturer.questions.store');
    Route::get('lecturer/questions/edit/{id}', [QuestionController::class, 'edit'])->name('lecturer.questions.edit');
    Route::patch('lecturer/questions/edit/{id}', [QuestionController::class, 'update'])->name('lecturer.questions.update');
    Route::delete('lecturer/questions/destroy/{id}', [QuestionController::class, 'destroy'])->name('lecturer.questions.destroy');
});

Route::group(['middleware' => 'student'], function(){
    Route::get('student/dashboard', [DashboardController::class, 'dashboard'])->name('student.dashboard');
});


require __DIR__.'/auth.php';

