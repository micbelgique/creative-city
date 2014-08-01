<?php

class EntryController extends BaseController {

  public function index() {
    $entries = Entry::all();
    return View::make('entries.index')->with('entries', $entries);
  }

  public function create() {
    //$entry = Entry::new();
  }

  public function store() {

  }

}
