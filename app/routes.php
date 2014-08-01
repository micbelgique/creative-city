<?php

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('entries', function()
{
  $entries = Entry::all();
  return View::make('entries/index')->with('entries', $entries);
});
