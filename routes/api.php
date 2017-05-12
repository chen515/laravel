<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/api/users', 'UserController@store');

Route::group(['middleware' => 'auth.basic'], function () {
    Route::get('/api/notes', 'NoteController@index');
    Route::get('/api/notes/{id}', 'NoteController@show');
    Route::post('/api/notes', 'NoteController@store');
    Route::put('/api/notes/{id}', 'NoteController@update');
    Route::delete('/api/notes/{id}', 'NoteController@destroy');
});