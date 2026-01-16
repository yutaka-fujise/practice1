<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

/*
|--------------------------------------------------------------------------
| ユーザー側（お問い合わせ）
|--------------------------------------------------------------------------
*/

// 入力画面
Route::get('/', [ContactController::class, 'index']);

// 確認画面
Route::post('/confirm', [ContactController::class, 'confirm']);

Route::post('/return', [ContactController::class, 'return'])->name('contact.return');

Route::post('/thanks', [ContactController::class, 'store'])->name('contact.store');

Route::middleware('auth')->group(function () {
    // 管理画面入口（おすすめ）
    Route::get('/admin', [AdminContactController::class, 'index'])
        ->name('admin.index');

Route::get('/admin/contacts', [AdminContactController::class, 'index'])
        ->name('admin.contacts.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/contacts/{id}', [AdminContactController::class, 'show'])
        ->name('admin.contacts.show');
});

Route::delete('/admin/{contact}', [ContactController::class, 'destroy'])->name('admin.destroy');