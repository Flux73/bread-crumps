<?php

use App\Http\Controllers\ProcessController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('years')->group( function() {
    Route::get('/', [ProcessController::class, 'getAllYears']);
    Route::prefix('/{year}/semesters')->group( function() {
        Route::get('/', [ProcessController::class, 'getAllSemesters'])->name('get.semester');
        Route::prefix('/{semester}/subjects')->group( function() {
            Route::get('/', [ProcessController::class, 'getAllSubjects'])->name('get.subject');
            Route::prefix('/{subject}/units')->group( function() {
                Route::get('/',[ProcessController::class, 'getAllUnits'])->name('get.unit'); 
                Route::prefix('/{unit}/lessons')->group( function() {
                    Route::get('/',[ProcessController::class, 'getAllLessons'])->name('get.lessons'); 
                    Route::get('/{lesson}',[ProcessController::class, 'getLesson'])->name('get.lesson'); 
                });
            });
        });
    });
});