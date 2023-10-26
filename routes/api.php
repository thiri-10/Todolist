<?php

use App\Http\Controllers\NoteApiController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskApiController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/Task', [TaskApiController::class,'store']); //Route for checked list

Route::get('/Task',[TaskApiController::class,'index'])->middleware('web'); //Route to get data for events in calendar







