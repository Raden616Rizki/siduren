<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/archive', function () {
    return view('pages.archive');
});

Route::get('/category', function () {
    return view('pages.categories.index');
});
