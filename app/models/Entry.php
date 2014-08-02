<?php

use Rhumsaa\Uuid\Uuid;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Entry extends Eloquent implements StaplerableInterface {
  use EloquentTrait;

  protected $table = 'entries';
  protected $fillable = array('title', 'content', 'url', 'picture',
                              'author_name', 'author_email', 'kind');


  public function __construct(array $attributes = array()) {
    $this->hasAttachedFile('picture', [
        'styles' => [
          'medium' => '300x300',
          'thumb' => '100x100'
        ]
    ]);
    parent::__construct($attributes);
  }

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
