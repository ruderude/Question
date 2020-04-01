<?php
use App\Question;

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
    $items = Question::all();
    $data = [
        'message' => 'こんにちわんこそば！',
        'items' => $items,
    ];
    return view('index', $data);
});

Auth::routes();

Route::get('/users/{id}', 'HomeController@users')->name('users');
Route::post('/question', 'HomeController@question')->name('question');
Route::get('/show/{id}', 'HomeController@show')->name('show');
Route::post('/answer', 'HomeController@answer')->name('answer');
Route::get('/home', 'HomeController@index')->name('home');
