<?php

class EntryController extends BaseController {


  private function getUserToken() {
    $userToken = Input::get('user_token');

    if($userToken == null) {
      $userToken = Cookie::get('user_token');
    }

    if($userToken == null) {
      App::abort(403);
    }

    return $userToken;
  }

  public function index() {
    $entries = Entry::all();
    return View::make('entries.index')->with('entries', $entries);
  }

  public function indexJson() {
    $entries = Entry::all();

    $response = $entries->map(function($entry){
      return $entry->asJson();
    });

    return Response::json($response);
  }

  public function show($id) {
    $entry = Entry::find($id);

    if($entry) {
      return View::make('entries.show')->with('entry', $entry);
    } else {
      App::abort(404);
    }
  }

  public function showAsAuthor($token) {
    $entry = Entry::where('token', '=', $token)->first();
    if($entry){
      $positive_votes = $entry->votes()->where('up', '=', true);
      $negative_votes = $entry->votes()->where('up', '=', false);

      return View::make('entries.show')->with('entry', $entry)
                                       ->with('votes_count', $entry->votes()->count())
                                       ->with('positive_votes', $positive_votes)
                                       ->with('negative_votes', $negative_votes)
                                       ->with('is_author', true);

    } else {
      App::abort(404);
    }
  }

  public function showAsVoter($id) {
    $userToken = $this->getUserToken();
    $voter = User::where('token', '=', $userToken)->first();
    $entry = Entry::find($id);


    // dd($voter);

    if($voter && $entry){
      return View::make('entries.show')->with('entry', $entry)
                                       ->with('voter', $voter);
    } else {
      App::abort(404);
    }
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
      'content'      => 'required',
      'kind'         => 'required|in:article,event'
    );

    if($input['kind'] == "event") {
      $rules['start_date'] = 'required';
    }

    $validator = Validator::make($input, $rules);
    $entry     = new Entry($input);

    if($validator->fails()) {
      return View::make('entries.create')->with('entry', $entry)
                                         ->withErrors($validator);
    }
    else {
      if($entry->save()) {
        Mail::send('emails.authorEntrySubmitted', [ 'entry' => $entry ], function($message) use ($entry) {
          $subject = 'Votre article a été soumis';
          $message->to($entry->author_email, $entry->author_name)->subject($subject);
        });

        foreach(User::all() as $user) {
          Mail::send('emails.moderatorEntrySubmitted', [ 'entry' => $entry ], function($message) use ($user, $entry) {
            $subject = 'Action requise: un article a été posté sur Creative Mons';
            $message->to($user->email, $user->name)->subject($subject);
          });
        }

        return Redirect::route('entries.index');
      } else {
        return "Impossible de créer l'article/évènement.";
      }
    }
  }

  public function voteUp($id) {
    $userToken = $this->getUserToken();
    $voter = User::where('token', '=', $userToken)->first();
    $entry = Entry::find($id);

    if($voter && $entry){
      $entry->voteUp($voter);
      return Redirect::route('entries.showAsVoter', [$id]);
    } else {
      App::abort(404);
    }
  }

  public function voteDown($id) {
    $userToken = $this->getUserToken();
    $voter = User::where('token', '=', $userToken)->first();
    $entry = Entry::find($id);

    if($voter && $entry){
      $entry->voteDown($voter);
      return Redirect::route('entries.showAsVoter', [$id]);
    } else {
      App::abort(404);
    }
  }
}
