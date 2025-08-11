<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

Route::resource('students',StudentController::class)->except(['show']);
Route::resource('courses', CourseController::class)->except(['show']);
// Route::get('/students',[StudentController::class, 'index']) ->name('students.index');

// Route::group(['prefix' => 'student','as'=>'students.'], function () {
//     Route::get('/create', [StudentController::class, 'create'])->name('create');
//     Route::post('/create', [StudentController::class, 'store'])->name('store');
//     Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('edit');
//     Route::put('/edit/{student}', [StudentController::class, 'update'])->name('update');
//     Route::delete('/destroy/{student}', [StudentController::class, 'destroy'])->name('destroy');
// });
Route::get('/courses/api', [CourseController::class, 'api'])->name('courses.api');
Route::get('/students/api', [StudentController::class, 'api'])->name('students.api');
Route::get('/', function () {
    return view('layout.master');
});
