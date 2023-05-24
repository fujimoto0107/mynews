<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\NewsController as PublicNewsController; // 追加

// トップページ
Route::get('/', function () {
    return view('welcome');
});

// 管理者用ルート
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    // ニュース関連
    Route::resource('news', NewsController::class);

    // プロフィール関連
    Route::resource('profile', ProfileController::class);
    Route::post('profile/create', [ProfileController::class, 'create'])->name('admin.profile.create');
    Route::post('profile/edit', [ProfileController::class, 'update'])->name('admin.profile.update');

    // ニュース作成ページ
    Route::group(['prefix' => 'news'], function () {
        Route::get('create', [NewsController::class, 'add'])->name('admin.news.add');
        Route::post('create', [NewsController::class, 'create'])->name('admin.news.create');
    });

    // ニュース一覧ページ
    Route::get('news', [NewsController::class, 'index'])->name('admin.news.index');

    // ニュース編集ページ
    Route::get('news/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::post('news/edit', [NewsController::class, 'update'])->name('admin.news.update');

    // ニュース削除ページ
    Route::get('news/delete', [NewsController::class, 'delete'])->name('admin.news.delete');
});

// 認証関連ルート
Auth::routes();

// ログイン後のホームページ
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// パブリックなニュース一覧ページ
Route::get('/', [PublicNewsController::class, 'index'])->name('news.index');

?>