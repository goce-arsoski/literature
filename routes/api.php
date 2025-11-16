<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProseController;
use App\Http\Controllers\QuoteController;

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

Route::get('/proza', [ProseController::class, 'index']);
Route::get('/proza/{id}', [ProseController::class, 'show']);
Route::post('/dodadiProza', [ProseController::class, 'store']);

Route::get('/poezija', [PoemController::class, 'index']);

Route::get('/citati', [QuoteController::class, 'index']);


Route::get('/newest', [UserController::class, 'newest']);
Route::get('/tekstovi', [UserController::class, 'tekstovi']);
Route::get('/mybook', [UserController::class, 'mybook']);
Route::get('/priznanija', [UserController::class, 'priznanja']);

// Route::get('/login', [UserController::class, 'login']);
// Route::get('/poezija', [UserController::class, 'poezija']);
