<?php

use Rhumsaa\Uuid\Uuid;

class Entry extends Eloquent {

  protected $table = 'entries';

}

Entry::creating(function($entry){
  $entry->token = Uuid::uuid4();
});
