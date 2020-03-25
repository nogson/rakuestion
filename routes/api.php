<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/questions', 'QuestionController@index');
Route::get('/question/{id}', 'QuestionController@show');
Route::get('/questions/search', 'QuestionController@search');
Route::post('/question/create', 'QuestionController@create');
Route::get('/question/{id}/answers', 'AnswerController@index');
Route::post('/answer/{id}/create', 'AnswerController@create');
Route::post('/answer/{id}/like', 'AnswerController@like');

