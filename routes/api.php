<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login/social', 'App\\Http\\Controllers\\SocialUserLogin@login');

Route::middleware(['auth:api'])->group(function () {
    Route::get('user', 'App\\Http\\Controllers\\AuthController@index');
    Route::resource('contests', 'App\\Http\\Controllers\\ContestController');
    Route::resource('contest-editions', 'App\\Http\\Controllers\\ContestEditionController');
    Route::resource('contest-edition-events', 'App\\Http\\Controllers\\ContestEditionEventController');
    Route::post('contest-edition-events/{contestEditionEvent}/question-answers',
        'App\\Http\\Controllers\\ContestEditionEventQuestionAnswerController@store'
    );
});

//Route::middleware(['binding'])->group(function () {
//
//});
//Route::middleware(['auth:api', 'binding'])->group(function () {
//
//});
