<?php

use Rhumsaa\Uuid\Uuid;

class Entry extends Eloquent {

  protected $table = 'entries';
  protected $fillable = array('title', 'content', 'url', 'author_name', 'author_email', 'kind');

  public function votes() {
    return $this->hasMany('Vote', 'user_id');
  }

  public function hasVoted($user) {
    return $this->votes()->where('user_id', '=', $user->id)->count() > 0;
  }

  public function voteUp($user) {
    if(!hasVoted($user)){
      $vote = new Vote([ 'user_id' => $user->id, 'up' => true ]);
      $this->votes()->save($vote);
    }
  }

  public function voteDown($user) {
    if(!hasVoted($user)){
      $vote = new Vote([ 'user_id' => $user->id, 'up' => false ]);
      $this->votes()->save($vote);
    }
  }

  public function authorUrl() {
    return URL::route('entries.showAsAuthor', array($this->token));
  }

  public function asJson() {
    return [
      'id'          => $this->id,
      'title'       => $this->title,
      'content'     => $this->content,
      'author_name' => $this->author_name,
      'kind'        => $this->kind,
      'path'        => URL::route("entries.show", array($this->id))
    ];
  }
}

Entry::creating(function($entry){
  $entry->token = Uuid::uuid4();
});
