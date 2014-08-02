<?php

// http://scotch.io/bar-talk/quick-tip-using-laravel-blade-with-angularjs
Blade::setContentTags('<%', '%>');          // for variables and all things Blade
Blade::setEscapedContentTags('<%%', '%%>'); // for escaped data

Route::get('/', function() {
	return View::make('hello');
});

Route::resource('entries', 'EntryController');

Route::get ('entries.json',           [ 'as' => 'entries.indexJson',    'uses' => 'EntryController@indexJson'    ]);
Route::get ('author/entries/{token}', [ 'as' => 'entries.showAsAuthor', 'uses' => 'EntryController@showAsAuthor' ]);

Route::get ('voter/{token}/entries',                [ 'as' => 'entries.indexAsVoter', 'uses' => 'EntryController@indexAsVoter' ]);
Route::get ('voter/{token}/entries/{id}',           [ 'as' => 'entries.showAsVoter',  'uses' => 'EntryController@showAsVoter'  ]);
Route::post('voter/{token}/entries/{id}/vote_up',   [ 'as' => 'entries.voteUp',       'uses' => 'EntryController@voteUp'       ]);
Route::post('voter/{token}/entries/{id}/vote_down', [ 'as' => 'entries.voteDown',     'uses' => 'EntryController@voteDown'     ]);
