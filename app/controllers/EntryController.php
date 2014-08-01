<?php

class EntryController extends BaseController {

  public function index() {
    $entries = Entry::all();
    return View::make('entries.index')->with('entries', $entries);
  }

  public function index_json() {
    $entries = Entry::all();
    return Response::json($entries);
  }

  public function create() {
    $entry = new Entry;
    return View::make('entries.create')->with('entry', $entry);
  }

  public function store() {
    $input = Input::all();

    $rules = array(
      'title'       => 'required',
      'email'       => 'required|email',
      'description' => 'required',
      'kind'        => 'required|in:article,event'
    );

    $validator = Validator::make($input, $rules);
    $entry     = new Entry($input);

    if($validator->fails()) {
      return View::make('entries.create')->with('entry', $entry)
                                         ->withErrors($validator);
    }
    else {
      if($entry->save()){
        return Redirect::route('entries.index');
      }
    }

  }
}
