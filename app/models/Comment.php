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
}

