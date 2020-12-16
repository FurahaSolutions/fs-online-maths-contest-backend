<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login/social', 'App\\Http\\Controllers\\SocialUserLogin@login');

//Route::middleware(['binding'])->group(function () {
//
//});
//Route::middleware(['auth:api', 'binding'])->group(function () {
//
//});
