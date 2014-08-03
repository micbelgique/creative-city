<?php

class CommentController extends BaseController {
  public function store() {
    $input = Input::all();
    $rules = array(
      'entry_id'     => 'required',
      'content'  => 'required',
    );

    $validator = Validator::make($input, $rules);
    $comment     = new Comment($input);

    if($validator->fails()) {
      return Redirect::back()->withErrors($validator)
                             ->withInput();
    }
    else {
      if($comment->save()) {
        return Redirect::route('thanks');
      } else {
        return "Impossible de créer le commentaire.";
      }
    }
  }
