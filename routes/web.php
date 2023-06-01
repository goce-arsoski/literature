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
    Route::resource('faq', \App\Http\Controllers\FaqController::class);
    Route::resource('subscriber', \App\Http\Controllers\SubscriberController::class);

    Route::get('/download_csv', [\App\Http\Controllers\Controller::class, 'download_csv'])->name('download_csv');
});

Route::get('/faqs', [\App\Http\Controllers\Controller::class, 'list_faqs'])->name('list_faqs');
Route::get('/landing_page', [\App\Http\Controllers\Controller::class, 'landing_page'])->name('landing_page');

Route::get('/{main_slug}/{slug}', [\App\Http\Controllers\Controller::class, 'list_blog'])->name('list_blog');
Route::get('/{main_slug}', [\App\Http\Controllers\Controller::class, 'list_blogs'])->name('list_blogs');