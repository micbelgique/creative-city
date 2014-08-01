<?php

class EntryController extends BaseController {

  public function index() {
    $entries = Entry::all();
    return View::make('entries.index')->with('entries', $entries);
  }

  public function create() {
    $entry = new Entry;
    return View::make('entries.create')->with('entry', $entry);
  }

  public function store() {
    $entry = new Entry(Input::all());

    if($entry->save()) {
      return Redirect::route('entries.index')->with('flash', 'Votre post a été envoyé');
    }

    return Redirect::route('entries.create')->withInput()->withErrors($s->errors());
  }

}
