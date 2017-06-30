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
    if (auth()->user()){
        return redirect('/startagame');
    }
    return redirect('/login');
});

Route::get('/newgame', 'LiveAnswersController@destroyAndNew');
Route::get('/answered/{id}', 'LiveAnswersController@thisAnswerWasAnswered');

Route::get('/startagame', function() {
    if (auth()->user()){
        return view('startagame');
    }
    return redirect('/login');
});
Route::get('/nogamestarted', function(){
    if (auth()->user()){
        return redirect('/newgame');
    }
    return redirect('/login');
});

Route::get('/play', 'PlayController@playGet');
Route::post('/play', 'PlayController@playPost');

Route::get('/create-an-answer', 'AnswerController@create');
Route::post('/create-an-answer', 'AnswerController@store');



Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
