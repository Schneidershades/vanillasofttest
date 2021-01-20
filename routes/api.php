<?php

use Illuminate\Support\Facades\Route;

Route::post('send', 'EmailController@store');
Route::post('list', 'EmailController@index');