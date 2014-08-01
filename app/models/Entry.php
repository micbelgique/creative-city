<?php

use Rhumsaa\Uuid\Uuid;

class Entry extends Eloquent {

  protected $table = 'entries';
  protected $fillable = array('title', 'description', 'url', 'author_name', 'author_email', 'kind');

  public function authorUrl() {
    return URL::route('entries.showAsAuthor', array($this->token));
  }
}

Entry::creating(function($entry){
  $entry->token = Uuid::uuid4();
});
