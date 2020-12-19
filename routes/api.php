<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login/social', 'App\\Http\\Controllers\\SocialUserLogin@login');

Route::middleware(['auth:api'])->group(function () {
    Route::resource('contests', 'App\\Http\\Controllers\\ContestController');
    Route::resource('contest-editions', 'App\\Http\\Controllers\\ContestEditionController');
});

//Route::middleware(['binding'])->group(function () {
//
//});
//Route::middleware(['auth:api', 'binding'])->group(function () {
//
//});
