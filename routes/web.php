<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'pages.index')
    ->middleware(['auth', 'password.confirm']);
