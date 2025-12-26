<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;

Route::get('/', function () {
    $categories = collect([
        (object)['id' => 1, 'content' => '商品の交換について'],
        (object)['id' => 2, 'content' => '不具合について'],
    ]);

    return view('index', compact('categories'));
});

Route::get('/confirm', function () {
    return view('confirm');
});

Route::get('/thanks', function () {
    return view('thanks');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('admin');
});
