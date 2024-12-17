<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $numeroUno = "jose";
    $numeroDos = 15;
    return $numeroUno + $numeroDos;
});
