<?php

use Rhumsaa\Uuid\Uuid;

class Entry extends Eloquent {

  protected $table = 'entries';
  protected $fillable = array('title', 'content', 'url', 'author_name', 'author_email', 'kind');

  public function authorUrl() {
    return URL::route('entries.showAsAuthor', array($this->token));
  }

  public function asJson() {
    return [
      'id'    => $this->id,
      'title' => $this->title,
      'path'  => URL::route("entries.show", array($this->id))
    ];
  }
}

Entry::creating(function($entry){
  $entry->token = Uuid::uuid4();
});
