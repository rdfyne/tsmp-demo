<?php

Route::name('backoffice.')->group( function () {

	Route::view('/', 'backoffice.home')->name('home');

	Route::resource('venue', 'VenueController')->except('show');

	Route::resource('category', 'CategoryController')->except('show');

	Route::resource('user', 'UserController')->except('show');

	Route::resource('course', 'CourseController');

	Route::resource('inhouse', 'InhouseController');

	Route::get('course/classroom-schedule/{occurrence}', 'ClassroomScheduleController')->name('classroom_schedule');

	Route::get('course/virtual-schedule/{occurrence}', 'VirtualScheduleController')->name('virtual_schedule');

	Route::get('account', 'AccountController@edit')->name('account.edit')->middleware('password.confirm');

	Route::patch('account', 'AccountController@update')->name('account.update');
});