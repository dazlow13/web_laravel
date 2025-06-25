<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;

Route::get('/',[StudentController::class, 'index']) ->name('students.index');
Route::get('/create',[StudentController::class, 'create'])->name('students.create');
Route::post('/create',[StudentController::class, 'store'])->name('students.store');