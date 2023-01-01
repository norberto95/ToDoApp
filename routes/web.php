<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;


Route::get('/', 'App\Http\Controllers\SiteController@index');

Route::prefix('/tasks')->group(function() {

    Route::get('/', 'App\Http\Controllers\TaskController@index')->name('tasks.index');


    Route::get('/add', 'App\Http\Controllers\TaskController@add')->name('tasks.add');
    

    Route::post('/store', 'App\Http\Controllers\TaskController@store')->name('tasks.store');


    Route::get('/{task}', 'App\Http\Controllers\TaskController@show')->name('tasks.show');


    Route::get('/{task}/edit', 'App\Http\Controllers\TaskController@edit')->name('tasks.edit');


    Route::put('/{task}', 'App\Http\Controllers\TaskController@update')->name('tasks.update');


    Route::delete('/{task}', 'App\Http\Controllers\TaskController@delete')->name('tasks.delete');

});


