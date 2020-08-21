<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/tasks', 'TasksController@index');
    Route::post('/tasks', 'TasksController@store');
    Route::post('/tasks/{task}', 'TasksController@update');
    Route::post('/tasks/{task}/edit', 'TasksController@edit');
