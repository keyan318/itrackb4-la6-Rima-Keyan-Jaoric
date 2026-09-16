<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TeacherController;


Route::get('/', function () {
    return view('welcome');
});

//Movies
Route::get('/movies/featured', [MovieController::class, 'featured'])->name('movies.featured');
Route::get('/movies/filter/{value?}', [MovieController::class, 'filter'])->name('movies.filter');
Route::resource('movies', MovieController::class)->only(['index', 'show']);

//Teachers
Route::get('/teachers/featured', [TeacherController::class, 'featured'])->name('teachers.featured');
Route::resource('teachers', TeacherController::class);
Route::resource('teachers', TeacherController::class)->only(['index.show']);


