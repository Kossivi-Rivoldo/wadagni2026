<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',function () {
    return view('home');
});

Route::get('/actualite',function () {
    return view('actualite');
});
Route::get('/evenement',function () {
    return view('evenement');
});