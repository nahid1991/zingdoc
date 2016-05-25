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
	// if(Auth::user()){
	// 	redirect('/homepage');
	// }
 //    else{
 //    	return view('default');
 //    }
	return view('default');
    
});
// Route::get('/', 'HomeController@index');


Route::get('/sign_it', 'TestController@sign');

// Route::get('/', 'HomeController@index');

// Route::auth();

Route::post('/auth/login', 'Auth\AuthController@login');


Route::get('/sign_up_doctor', 'Auth\AuthController@doc_sign');

Route::get('/sign_up_patient', 'Auth\AuthController@pat_sign');

Route::get('/sign_up_entity', 'Auth\AuthController@entity_sign');

Route::get('/auth/logout', 'Auth\AuthController@logout');

Route::get('/homepage', 'TestController@home');


Route::get('/auth/logout', 'Auth\AuthController@logout');

Route::get('/homepage', 'TestController@home');

Route::get('/test', 'TestController@run');

Route::get('register/verify/{confirmationCode}', 'TestController@email');



// Route::get('/test', function () {
//     return view('sign_up_test');
// });

// Route::get('/test2', function(){
// 	echo('test');
// });



// Route::post('auth/register', function () {
//     return redirect('/test');
// });



Route::get('/doc-prof/{username}', 'PatientController@docprof');

// Route::group(['middleware' => 'auth', 'after' => 'no-cache'], function () {
//     Route::get('/auth/logout', 'Auth\AuthController@logout');
// 	Route::get('/homepage', 'TestController@home');
// });



Route::group(['middleware' => ['web','auth','revalidate']], function () {
    Route::get('/homepage', 'TestController@home');
	Route::get('/auth/logout', 'Auth\AuthController@logout');
	Route::get('/set-appointment', 'DoctorController@setAppoint');
	Route::get('/entity-dashboard', 'EntityController@dashboard');
	Route::get('/doc-profile', 'DoctorController@profile');
	Route::get('/doc-profile-edit', 'DoctorController@profileEdit');
	Route::get('/doc-blog', 'DoctorController@blog');
	Route::get('/doc-account-settings', 'DoctorController@settings');
	Route::get('/doc-comments', 'DoctorController@comments');
	Route::get('/patient-comments', 'PatientController@comments');
	Route::get('/patient-profile', 'PatientController@profile');
	Route::get('/entity-appointments', 'EntityController@appointments');
	Route::get('/entity-profile', 'EntityController@profile');
	Route::get('/entity-profile-edit', 'EntityController@profileEdit');
	Route::get('/entity-account-settings', 'EntityController@settings');
	Route::post('/schedule-make', 'ScheduleController@make');
	Route::get('/search', 'SearchController@search');
	Route::get('/appointment-form/{id}/{date}/{time}', 'ScheduleController@form_patient');
	Route::get('/get-appointment', 'PatientController@appointed');
	Route::post('/appointing', 'ScheduleController@submission');	//posts appointments
	Route::post('/find-doc', 'EntityController@test');
	Route::get('/doctor/{username}', 'EntityController@trial');		//shows doctor result
	Route::get('/approve/{username}/{patient}/{time}', 'EntityController@approve');
	Route::get('/decline/{username}/{patient}', 'EntityController@cancel');
	Route::get('/checked/{username}/{patient}', 'EntityController@doc_checked');
	Route::get('/canceled/{username}/{patient}', 'EntityController@doc_cancel');
	Route::get('/doctor-calendar', 'CalendarController@show');
	Route::get('/scheduling/{username}/{year}/{month}/{day}', 'CalendarController@make');
	Route::post('/set-timing', 'CalendarController@sche');		//posts slots
	Route::post('/doc-data', 'DoctorController@make_profile');
	Route::get('/prescription/{p_user}/{name}/{time}', 'DoctorController@doc_checked');
	Route::post('/prescribe', 'DoctorController@prescribe');
	Route::get('/{username}', 'DoctorController@patient_profile');
	Route::post('/add-doctor', 'EntityController@add_doctor');
	Route::post('/propic', 'TestController@propic');
	Route::get('/calendar/{username}', 'EntityController@calendar');
	Route::get('/schedule-make/{username}/{year}/{month}/{day}', 'EntityController@make');
});

