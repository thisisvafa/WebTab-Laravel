<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\Home\ShowController::class, 'index']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/comments', [\App\Http\Controllers\Comments\ShowController::class, 'index'])->name('comments');
    Route::get('/comments/create', [\App\Http\Controllers\Comments\CreateController::class, 'create'])->name('commentsCreate');
    Route::post('/comments/store', [\App\Http\Controllers\Comments\CreateController::class, 'store'])->name('commentsStore');
    Route::get('/comments/{id}', [\App\Http\Controllers\Comments\ShowController::class, 'show'])->name('commentsShow');
    Route::post('/comments/store', [\App\Http\Controllers\Comments\CreateController::class, 'storeParent'])->name('commentsStoreParent');
    Route::get('/comments/edit/{id}', [\App\Http\Controllers\Comments\UpdateController::class, 'edit'])->name('commentsEdit');
    Route::put('/comments/update/{id}', [\App\Http\Controllers\Comments\UpdateController::class, 'update'])->name('commentsUpdate');
});

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';


