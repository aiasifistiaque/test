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

Route::get('/questionsapi','PostController@getQuestionsApi');
Route::get('/questions/{number}','PostController@getTenQuestions');
Route::get('/question/{question}', 'PostController@getpost');
Route::get('/question/ssc/{subject}/{board}/{year}','PostController@getSSCQuestionApi');
Route::apiresource('/qstn', 'QuestionController');
Route::get('/randomquestion','QuestionController@random');
Route::post('/savequestion','QuestionController@saveQuestion');