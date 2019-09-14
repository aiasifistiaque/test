<?php

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
    return view('pages.addAQuestion');
});
Route::get('/addssc', function () {
    return view('pages.addSSCBoardQuestion');
});
Route::get('/test', function () {
    return view('pages.test');
});
Route::get('/app/home', function () {
    return view('theapp.home');
});
Route::get('/app/sscbangla', function () {
    return view('theapp.sscbangla');
});
Route::get('/app/randomquestion',function(){
    return view('theapp.randomQuestions');
});
Route::get('/ssc', function () {
    return view('pages.ssc');
});
Route::post('/addaquestion','PostController@postQuestion');
Route::post('/addsscquestion','PostController@postSSCQuestion');
Route::get('/allquestions',function(){
    return view('pages.view');
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
