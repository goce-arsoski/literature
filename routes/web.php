<?php

use App\Models\Settings;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoemController;
use App\Http\Controllers\ProseController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\AuthorController;

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
])
->prefix('admin')
->group(function () {
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


    // New routes
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');

    Route::get('/prose', [ProseController::class, 'adminIndex'])->name('prose.adminIndex');
    Route::get('/prose/create', [ProseController::class, 'create'])->name('prose.create');

    Route::get('/poem', [PoemController::class, 'adminIndex'])->name('poem.adminIndex');
    Route::get('/poem/create', [PoemController::class, 'create'])->name('poem.create');

    Route::get('/quotes', [QuoteController::class, 'adminIndex'])->name('quotes.adminIndex');
    Route::get('/quotes/create', [QuoteController::class, 'create'])->name('quotes.create');


});


Route::get('/faqs', [\App\Http\Controllers\Controller::class, 'list_faqs'])->name('list_faqs');
Route::get('/landing_page', [\App\Http\Controllers\Controller::class, 'landing_page'])->name('landing_page');

Route::get('/{main_slug}/{slug}', [\App\Http\Controllers\Controller::class, 'list_blog'])->name('list_blog');
Route::get('/{main_slug}', [\App\Http\Controllers\Controller::class, 'list_blogs'])->name('list_blogs');
