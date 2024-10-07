<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'card'], function () {
   /* Route::post('post', \App\Http\Controllers\card\StoreController::class);*/
    Route::get('/get', \App\Http\Controllers\card\IndexController::class);
    Route::get('/get/{card}',\App\Http\Controllers\ShowController::class);
      Route::patch('/get/{card}', \App\Http\Controllers\UpdateController::class);
     /* Route::delete('/{person}', \App\Http\Controllers\person\DeleteController::class);*/
});
