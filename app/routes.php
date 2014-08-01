<?php

// http://scotch.io/bar-talk/quick-tip-using-laravel-blade-with-angularjs
Blade::setContentTags('<%', '%>');          // for variables and all things Blade
Blade::setEscapedContentTags('<%%', '%%>'); // for escaped data

Route::get('/', function() {
	return View::make('hello');
});

Route::resource('entries', 'EntryController');

Route::get ('entries.json',           [                                 'uses' => 'EntryController@indexJson'    ]);
Route::get ('author/entries/{token}', [ 'as' => 'entries.showAsAuthor', 'uses' => 'EntryController@showAsAuthor' ]);

// Route::get ('voter/entries/{token}',           [ 'as' => '', 'uses' => 'EntryController@showAsVoter' ]);
// Route::post('voter/entries/{token}/vote_up',   [ 'as' => '', 'uses' => 'EntryController@voteUp'      ]);
// Route::post('voter/entries/{token}/vote_down', [ 'as' => '', 'uses' => 'EntryController@voteDown'    ]);
