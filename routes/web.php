<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TaskController;
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

Route::get('/login', [AuthController::class, 'form'])->name('login');
Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'list']);

    Route::get('/task/create', [TaskController::class, 'create']);
    Route::post('/task/save', [TaskController::class, 'save']);
    Route::post('/task/update/{id}', [TaskController::class, 'update']);
    Route::get('/task/delete/{id}', [TaskController::class, 'delete']);
    Route::post('/task/status/{id}', [TaskController::class, 'status']);
    Route::get('/task/{id}', [TaskController::class, 'info']);
    Route::get('/task/edit/{id}', [TaskController::class, 'edit']);

    Route::post('/comment/save/{id}', [CommentController::class, 'save']);
    Route::get('/comment/delete/{id}', [CommentController::class, 'delete']);
});
