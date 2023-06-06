<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('news', NewsController::class)->middleware('auth');

    Route::resource('profile', ProfileController::class)->middleware('auth');
    Route::post('profile/create', [ProfileController::class, 'create'])->name('admin.profile.create');
    Route::post('profile/edit', [ProfileController::class, 'update'])->name('admin.profile.update');

    Route::group(['prefix' => 'news'], function () {
        Route::get('create', [NewsController::class, 'add'])->name('admin.news.add');
        Route::post('create', [NewsController::class, 'create'])->name('admin.news.create');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
    Route::get('news', 'index')->name('news.index');
});

Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
    Route::get('news', 'index')->name('news.index');
    Route::get('news/edit', 'edit')->name('news.edit');
    Route::post('news/edit', 'update')->name('news.update');
});

Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
    Route::get('news', 'index')->name('news.index');
    Route::get('news/edit', 'edit')->name('news.edit');
    Route::post('news/edit', 'update')->name('news.update');
    Route::get('news/delete', 'delete')->name('news.delete');

});

use App\Http\Controllers\NewsController as PublicNewsController;
Route::get('/', [PublicNewsController::class, 'index'])->name('news.index')->middleware('auth');