<?php

use App\Http\Controllers\GradebookController;
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

Route::get('/', [GradebookController::class, 'index']);
Route::get('/gradebooks/{id}', [GradebookController::class, 'show']);
Route::post('/gradebooks/create', [GradebookController::class, 'store']);
Route::delete('/gradebooks/{id}', [GradebookController::class, 'destroy']);
Route::put('/gradebooks/{id}/edit', [GradebookController::class, 'update']);


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/active-user', [AuthController::class, 'getActiveUser'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
