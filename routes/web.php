<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hako', function () {
    return response()->json('ini hako');
});


Route::get('/{params}', function ($params) {
    return response()->json($params);
});


