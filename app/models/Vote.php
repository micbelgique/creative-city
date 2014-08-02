<?php

class Vote extends Eloquent {

  protected $table = 'votes';

  public function user() {
    return $this->belongsTo('User');
  }

  public function entry() {
    return $this->belongsTo('Entry');
  }

}
