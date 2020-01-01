<?php

Route::get('/', 'Frontend\DashboardController@index');
Route::get('/institute_support', 'Frontend\DashboardController@welcome')->name('institute_page');
Route::get('/board_support', 'Frontend\DashboardController@board_welcome')->name('board_page');

Route::group(['prefix'=>'admin', 'namespace'=>'Backend', 'as'=>'backend.', 'middleware'=>'auth'], function(){
	Route::get('/', 'DashboardController@dashboard')->name('dashboard');
	Route::get('/today-enquery', 'EnqueryController@today_enquery')->name('todays_enquery');
	Route::get('/archived-enquery', 'EnqueryController@archived_enqueries')->name('archieved_enqueries');
	Route::get('/trashed-enquery', 'EnqueryController@trashed_enqueries')->name('trashed_enqueries');

	Route::post('/send-feedback-sms', 'EnqueryController@send_feedback_sms_to_client')->name('send_feedback_sms_to_client');
	Route::post('/make-enquery-done', 'EnqueryController@make_enquery_done')->name('make_enquery_done');
	Route::post('/send-enquery-to-trash', 'EnqueryController@send_enquery_to_trash')->name('send_enquery_to_trash');

	Route::get('/board-add', 'BoardController@add_board_view')->name('add_board');
	Route::post('/board-add', 'BoardController@insert_a_board');
	Route::get('/board-list', 'BoardController@all_board')->name('board_list');
	Route::post('/board-edit', 'BoardController@edit_a_board')->name('board_edit');
	Route::post('/board-delete', 'BoardController@delete_a_board')->name('board_delete');

	Route::get('service-add', 'ServiceController@add_service_view')->name('add_service');
	Route::post('service-add', 'ServiceController@insert_a_service');
	Route::get('services', 'ServiceController@index')->name('services');
});

Route::group(['namespace'=>'Frontend', 'prefix'=>'frontend', 'as'=>'frontend.'], function(){
	Route::post('/form-submit', 'EnqueryController@insert_user_enqury')->name('enquery_submit');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('institute-query-history', 'Frontend\EnqueryController@institute_query_history')->name('institute_query_history');