<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin-webtab', 'namespace' => 'Admin'], function () {
    Route::get('/login', [\App\Http\Controllers\Admin\Auth\AdminController::class, 'login'])->name('adminLogin');
    Route::post('/login', [\App\Http\Controllers\Admin\Auth\AdminController::class, 'postLogin'])->name('adminLoginPost');
    Route::get('/logout', [\App\Http\Controllers\Admin\Auth\AdminController::class, 'logout'])->name('AdminLogout');

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Dashboard\ShowController::class, 'index'])->name('dashboardAdmin');

        Route::get('/user', [\App\Http\Controllers\Admin\User\ShowController::class, 'index'])->name('userAdmin');
        Route::get('/user/create', [\App\Http\Controllers\Admin\User\StoreController::class, 'create'])->name('userCreateAdmin');
        Route::post('/user/store', [\App\Http\Controllers\Admin\User\StoreController::class, 'store'])->name('userStoreAdmin');
        Route::get('/user/edit/{id}', [\App\Http\Controllers\Admin\User\UpdateController::class, 'edit'])->name('userEditAdmin');
        Route::put('/user/update/{id}', [\App\Http\Controllers\Admin\User\UpdateController::class, 'update'])->name('userUpdateAdmin');
        Route::delete('/user/destroy/{id}', [\App\Http\Controllers\Admin\User\DestroyController::class, 'destroy'])->name('userDestroyAdmin');

        Route::get('/comments', [\App\Http\Controllers\Admin\Comments\ShowController::class, 'index'])->name('commentsAdmin');
        Route::get('/comments/{id}', [\App\Http\Controllers\Admin\Comments\ShowController::class, 'show'])->name('commentsShowAdmin');
        Route::post('/comments/store', [\App\Http\Controllers\Admin\Comments\StoreController::class, 'store'])->name('commentsStoreAdmin');
        Route::get('/comments/edit/{id}', [\App\Http\Controllers\Admin\Comments\UpdateController::class, 'edit'])->name('commentsEditAdmin');
        Route::put('/comments/update/{id}', [\App\Http\Controllers\Admin\Comments\UpdateController::class, 'update'])->name('commentsUpdateAdmin');
        Route::delete('/comments/destroy/{id}', [\App\Http\Controllers\Admin\Comments\DestroyController::class, 'destroy'])->name('commentsDestroyAdmin');
    });
});
