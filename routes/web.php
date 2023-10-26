<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('Task',TaskController::class); //Route for crud of tasks
    Route::resource('Category',CategoryController::class); //Route for category 
    
    // Route for today list
    Route::get('/today',[TaskController::class,'today'])->name('task.today');

    // Route for upcoming
    Route::get('/upcoming',[TaskController::class,'upcoming'])->name('task.upcoming');

    //Route for calander
    Route::get('/calendar',[TaskController::class,'showCalendar'])->name('task.calendar');


    Route::resource('Note',NoteController::class);// Route for sticky note
   
    

    

});