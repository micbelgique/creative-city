<?php

class EntryController extends BaseController {

  public function index() {
    $entries = Entry::all();
    return View::make('entries.index')->with('entries', $entries);
  }

  public function indexJson() {
    $entries = Entry::all();
    return Response::json($entries);
  }

  public function show($id) {
    $entry = Entry::find($id);
    return View::make('entries.show')->with('entry', $entry);
  }

  public function showAsAuthor($token) {
    $entry = Entry::where('token', '=', $token)->first();
    if($entry){
      return $entry->title;
    }
  }

  public function showAsVoter() {

  }

  public function create() {
    $entry = new Entry;
    return View::make('entries.create')->with('entry', $entry);
  }

  public function store() {
    $input = Input::all();

    $rules = array(
      'title'        => 'required',
      'author_name'  => 'required',
      'author_email' => 'required|email',
      'description'  => 'required',
      'kind'         => 'required|in:article,event'
    );

    $validator = Validator::make($input, $rules);
    $entry     = new Entry($input);

    if($validator->fails()) {
      return View::make('entries.create')->with('entry', $entry)
                                         ->withErrors($validator);
    }
    else {
      if($entry->save()) {
        Mail::send('emails.newEntrySubmitted', [ 'entry' => $entry ], function($message) use ($entry) {
          $subject = 'Un nouvel article/évènement de sa mère a été soumis';
          $message->to($entry->author_email, $entry->author_name)->subject($subject);
        });

        return Redirect::route('entries.index');
      } else {
        return "Impossible de créer l'article/évènement.";
      }
    }

  }
}
