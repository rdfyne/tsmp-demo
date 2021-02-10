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

Auth::routes();
Route::get('/in-housetraining','inhouse@index')->name('in-housetraining');
Route::post('/register','inhouse@adddata')->name('register');
Route::get('/inhouses','inhouse@getdata')->name('inhouses');
Route::name('front.')->group( function () {

	Route::namespace('Front')->group( function () {


		Route::get('/', 'CategoryController@index')->name('category.index');

		Route::get('{category:slug}', 'CategoryController@show')->name('category.show');

		Route::get('{category:slug}/{course:slug}', 'CourseController')->name('course.show');

		Route::get('{course:slug}/classroom-training/{occurrence}', 'ClassroomScheduleController@form')->name('occurrence.form');

		Route::post('{occurrence}/classroom-training', 'ClassroomScheduleController@application')->name('occurrence.apply');
		


		Route::get('{course:slug}/virtual-training/{occurrence}', 'VirtualScheduleController@form')->name('online_occurrence.form');

		Route::post('{occurrence}/virtual-training', 'VirtualScheduleController@application')->name('online_occurrence.apply');

		Route::get('classroom-training/{application}/feedback', 'ClassroomScheduleController@feedback')->name('occurrence.feedback');

		Route::get('virtual-training/{application}/feedback', 'VirtualScheduleController@feedback')->name('online_occurrence.feedback');

		Route::resource('inhouse', 'InhouseController');
	});
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
