<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| ユーザー側（お問い合わせ）
|--------------------------------------------------------------------------
*/

// 入力画面
Route::get('/', [ContactController::class, 'index']);

// 確認画面
Route::post('/confirm', [ContactController::class, 'confirm']);