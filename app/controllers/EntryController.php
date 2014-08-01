<?php

class EntryController extends BaseController {

  public function index() {
    $entries = Entry::all();
    return View::make('entries.index')->with('entries', $entries);
  }

}
