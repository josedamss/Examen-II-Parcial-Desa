<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/ejemplo-modal', 'ejemplo-modal.index');
