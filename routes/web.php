<?php

use Illuminate\Support\Facades\Route;

use App\Models\Settings;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('blog', \App\Http\Controllers\BlogController::class);

    Route::post('/upload', [\App\Http\Controllers\Controller::class, 'upload']);

    Route::resource('settings', \App\Http\Controllers\SettingsController::class);
    Route::resource('faqs', \App\Http\Controllers\FaqsController::class);
});

Route::get('/faq', [\App\Http\Controllers\Controller::class, 'list_faqs'])->name('list_faqs');

Route::get('/{main_slug}/{slug}', [\App\Http\Controllers\Controller::class, 'list_blog'])->name('list_blog');
Route::get('/{main_slug}', [\App\Http\Controllers\Controller::class, 'list_blogs'])->name('list_blogs');