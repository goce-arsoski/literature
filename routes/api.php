<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Routes for React
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/proza', [UserController::class, 'proza']);

Route::get('/newest', [UserController::class, 'newest']);
Route::get('/poezija', [UserController::class, 'poezija']);
Route::get('/citati', [UserController::class, 'citati']);
Route::get('/tekstovi', [UserController::class, 'tekstovi']);
Route::get('/mybook', [UserController::class, 'mybook']);
Route::get('/priznanija', [UserController::class, 'priznanja']);

// Route::get('/login', [UserController::class, 'login']);
// Route::get('/poezija', [UserController::class, 'poezija']);
