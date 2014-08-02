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

}
