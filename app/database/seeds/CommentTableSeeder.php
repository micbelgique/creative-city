<?php

class CommentTableSeeder extends Seeder {

  public function run() {
    DB::table('comments')->delete();

    Comment::create([ 'user_id' => 1, 'entry_id' => 1, 'content' => "A retravailler niveau orthographe !"  ]);
    Comment::create([ 'user_id' => 2, 'entry_id' => 1, 'content' => "Nul !"  ]);

    Comment::create([ 'user_id' => 1, 'entry_id' => 2, 'content' => "Sympa :-)"  ]);
  }

}
