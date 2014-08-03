<?php

class Comment extends Eloquent {
  protected $table = 'comments';
  protected $fillable = array('user_id', 'entry_id', 'content');

  public function user() {
    return $this->belongsTo('User');
  }

  public function entry() {
    return $this->belongsTo('Entry');
  }

  public function notifyEntryAuthor() {
    $entry = $this->entry;

    Mail::send('emails.authorEntryNewComment', [ 'entry' => $entry, 'comment' => $this ], function($message) use ($entry) {
      $subject = 'Nouveau commentaire sur votre article';
      $message->to($entry->author_email, $entry->author_name)
              ->subject($subject);
    });
  }
}

