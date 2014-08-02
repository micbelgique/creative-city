<?php

class Vote extends Eloquent {

  protected $table = 'votes';
  protected $fillable = array('user_id', 'entry_id', 'up');


  public function user() {
    return $this->belongsTo('User');
  }

  public function entry() {
    return $this->belongsTo('Entry');
  }

  public function notifyAuthor() {
    $entry = $this->entry;

    Mail::send('emails.authorEntryNewVote', [ 'entry' => $entry ], function($message) use ($entry) {
      $message->to($entry->author_email, $entry->author_name)
              ->subject('Nouveau vote : ' . $entry->title);
    });
  }

}
