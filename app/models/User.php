<?php

use Rhumsaa\Uuid\Uuid;

class User extends Eloquent {

	protected $table = 'users';

  public function comments() {
    return $this->hasMany('Comment');
  }
}

User::creating(function($user){
  $user->token = Uuid::uuid4();
});
