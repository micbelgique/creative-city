<?php

use Rhumsaa\Uuid\Uuid;

class User extends Eloquent {

	protected $table = 'users';

}

User::creating(function($user){
  $user->token = Uuid::uuid4();
});
