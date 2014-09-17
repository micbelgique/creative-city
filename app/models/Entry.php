<?php

use Rhumsaa\Uuid\Uuid;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Entry extends Eloquent implements StaplerableInterface {
  use EloquentTrait;

  protected $table = 'entries';
  protected $fillable = array('title', 'content', 'url', 'picture',
                              'author_name', 'author_email', 'kind',
                              'start_date', 'end_date');


  public function __construct(array $attributes = array()) {
    $this->hasAttachedFile('picture', [
        'styles' => [
          'large'  => '1140x550',
          'medium' => '360x210#',
          'thumb'  => '100x100'
        ]
    ]);
    parent::__construct($attributes);
  }

  public function comments() {
    return $this->hasMany('Comment');
  }

  public function votes() {
    return $this->hasMany('Vote');
  }

  public function upVotes() {
    return $this->votes()->where('up', '=', true);
  }

  public function downVotes() {
    return $this->votes()->where('up', '=', false);
  }

  public function hasVoted($user) {
    return $this->votes()->where('user_id', '=', $user->id)->count() > 0;
  }

  public function voteUp($user) {
    if(!$this->hasVoted($user)){
      $vote = new Vote([ 'user_id' => $user->id, 'up' => true ]);
      $this->votes()->save($vote);
      return $vote;
    }
  }

  public function voteDown($user) {
    if(!$this->hasVoted($user)){
      $vote = new Vote([ 'user_id' => $user->id, 'up' => false ]);
      $this->votes()->save($vote);
      return $vote;
    }
  }

  public function authorUrl() {
    return URL::route('entries.showAsAuthor', array($this->token));
  }

  public function url() {
    return URL::route("entries.show", array($this->id));
  }

  public function notifyAuthor() {
    $entry = $this;

    Mail::send('emails.authorEntrySubmitted', [ 'entry' => $entry ], function($message) use ($entry) {
      $subject = 'Votre article a été soumis';
      $message->to($entry->author_email, $entry->author_name)->subject($subject);
    });
  }

  public function notifyUsers() {
    $entry = $this;

    foreach(User::all() as $user) {
      Mail::send('emails.userEntrySubmitted', [ 'entry' => $entry, 'user' => $user ], function($message) use ($user, $entry) {
        $subject = 'Action requise: un article a été posté sur Creative Mons';
        $message->to($user->email, $user->name)
                ->subject($subject);
      });
    }
  }

  public function isPublished() {
    return $this->upVotes()->count() >= 4 && $this->downVotes()->count() <= 3;
  }

  public function asJson() {
    return [
      'id'          => $this->id,
      'title'       => $this->title,
      'content'     => $this->content,
      'author_name' => $this->author_name,
      'kind'        => $this->kind,
      'path'        => $this->url(),
      'picture_url' => $this->picture->url('medium')
    ];
  }
}

Entry::creating(function($entry){
  $entry->token = Uuid::uuid4();
});
