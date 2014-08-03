<?php

class EntryController extends BaseController {
  public function index() {
    $entries = Entry::all()->filter(function($entry){
      return $entry->isPublished();
    });

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
      $positiveVotes = $entry->upVotes();
      $negativeVotes = $entry->downVotes();

      return View::make('entries.show')->with('entry', $entry)
                                       ->with('votes_count', $entry->votes()->count())
                                       ->with('positiveVotes', $positiveVotes)
                                       ->with('negativeVotes', $negativeVotes)
                                       ->with('is_author', true);

    } else {
      App::abort(404);
    }
  }

  public function showAsVoter($id) {

    $userToken = $this->getUserToken();
    $voter = User::where('token', '=', $userToken)->first();
    $entry = Entry::find($id);
    $comment = new Comment();
    $comment->user = $voter;

    if($voter && $entry){
      return View::make('entries.show')->with('entry',       $entry)
                                       ->with('comment',     $comment)
                                       ->with('voter',       $voter)
                                       ->with('votes_count', $entry->votes()->count());
    } else {
      App::abort(404);
    }
  }

  public function create() {
    $entry = new Entry;
    return View::make('entries.create')->with('entry', $entry);
  }

  public function store() {
    // $input = [
    //   'kind'         => Input::get('kind'),
    //   'title'        => Input::get('title'),
    //   'content'      => Input::get('content'),
    //   'url'          => Input::get('url'),
    //   'author_name'  => Input::get('author_name'),
    //   'author_email' => Input::get('author_email'),
    //   'picture'      => Input::get('picture'),
    // ];


    $input = Input::all();

    if($input['kind'] == 'event') {
      $input['start_date'] = Input::get('start_date');
      $input['end_date']   = Input::get('end_date');
    }

    $rules = array(
      'title'        => 'required',
      'content'      => 'required',
      'author_name'  => 'required',
      'picture'      => 'required',
      'author_email' => 'required|email',
      'content'      => 'required',
      'kind'         => 'required|in:article,event'
    );

    if($input['kind'] == 'event') {
      $rules['start_date'] = 'required|date';
      $rules['end_date']   = 'required|date';
    }

    $validator = Validator::make($input, $rules);
    $entry     = new Entry($input);

    if($validator->fails()) {
      //return View::make('entries.create')->with('entry', $entry)
      return Redirect::back()->with('entry', $entry)
                             ->withErrors($validator)
                             ->withInput($input);
    }
    else {
      if($entry->save()) {
        $entry->notifyAuthor();
        $entry->notifyUsers();
        return Redirect::route('thanks');
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
      $vote = $entry->voteUp($voter);
      $vote->notifyAuthor();

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
      $vote = $entry->voteDown($voter);
      $vote->notifyAuthor();

      return Redirect::route('entries.showAsVoter', [$id]);
    } else {
      App::abort(404);
    }
  }
}
