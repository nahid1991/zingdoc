<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('/doctor/register', 'TestController@test');


Route::get('/', function () {
    return view('default');
});

// Route::get('/', 'HomeController@index');

// Route::auth();


Route::get('/sign_up_doctor', 'Auth\AuthController@doc_sign');

Route::get('/sign_up_patient', 'Auth\AuthController@pat_sign');

// Route::get('/test', function () {
//     return view('sign_up_test');
// });

// Route::get('/test2', function(){
// 	echo('test');
// });



// Route::post('auth/register', function () {
//     return redirect('/test');
// });
