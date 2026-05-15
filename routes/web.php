<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // 1. Count all students
    $totalStudents = Student::count();

    // 2. Get the 5 most recently added students
    $latestStudents = Student::latest()->take(5)->get();

    return view('dashboard', compact('totalStudents', 'latestStudents'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    // 1. Custom Import Route (Must be above resource)
    Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');

    // 2. Standard Student Routes
    Route::resource('students', StudentController::class);

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';