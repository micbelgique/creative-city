<?php

// http://scotch.io/bar-talk/quick-tip-using-laravel-blade-with-angularjs
Blade::setContentTags('<%', '%>');          // for variables and all things Blade
Blade::setEscapedContentTags('<%%', '%%>'); // for escaped data

Route::get('/', function() {
	return View::make('hello');
});

Route::resource('entries', 'EntryController');
Route::get('entries.json', array('uses' => 'EntryController@index_json'));

