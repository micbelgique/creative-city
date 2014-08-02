<?php

class VoteTableSeeder extends Seeder {

  public function run() {
    DB::table('votes')->delete();
    Vote::create([ 'user_id' => 1, 'entry_id' => 1, 'up' => true  ]);
    Vote::create([ 'user_id' => 2, 'entry_id' => 1, 'up' => true  ]);
    Vote::create([ 'user_id' => 1, 'entry_id' => 2, 'up' => false ]);
    Vote::create([ 'user_id' => 2, 'entry_id' => 2, 'up' => true  ]);
  }

}
