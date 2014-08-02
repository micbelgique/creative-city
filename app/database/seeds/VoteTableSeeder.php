<?php

class VoteTableSeeder extends Seeder {

  public function run() {
    DB::table('votes')->delete();
    Vote::create([ 'user_id' => 1, 'entry_id' => 1, 'up' => true  ]);
    Vote::create([ 'user_id' => 2, 'entry_id' => 1, 'up' => true  ]);
    Vote::create([ 'user_id' => 3, 'entry_id' => 1, 'up' => true  ]);

    Vote::create([ 'user_id' => 1, 'entry_id' => 2, 'up' => true  ]);
    Vote::create([ 'user_id' => 2, 'entry_id' => 2, 'up' => true  ]);
    Vote::create([ 'user_id' => 3, 'entry_id' => 2, 'up' => true  ]);

    Vote::create([ 'user_id' => 1, 'entry_id' => 3, 'up' => true  ]);
    Vote::create([ 'user_id' => 2, 'entry_id' => 3, 'up' => true  ]);
    Vote::create([ 'user_id' => 3, 'entry_id' => 3, 'up' => true  ]);

    Vote::create([ 'user_id' => 1, 'entry_id' => 4, 'up' => true  ]);
    Vote::create([ 'user_id' => 2, 'entry_id' => 4, 'up' => true  ]);
    Vote::create([ 'user_id' => 3, 'entry_id' => 4, 'up' => true  ]);

    Vote::create([ 'user_id' => 1, 'entry_id' => 5, 'up' => true  ]);
    Vote::create([ 'user_id' => 2, 'entry_id' => 5, 'up' => true  ]);
    Vote::create([ 'user_id' => 3, 'entry_id' => 5, 'up' => true  ]);

    Vote::create([ 'user_id' => 1, 'entry_id' => 6, 'up' => true  ]);
    Vote::create([ 'user_id' => 2, 'entry_id' => 6, 'up' => true  ]);
    Vote::create([ 'user_id' => 3, 'entry_id' => 6, 'up' => true  ]);

    Vote::create([ 'user_id' => 1, 'entry_id' => 7, 'up' => true  ]);
    Vote::create([ 'user_id' => 2, 'entry_id' => 7, 'up' => true  ]);
    Vote::create([ 'user_id' => 3, 'entry_id' => 7, 'up' => true  ]);

    Vote::create([ 'user_id' => 1, 'entry_id' => 8, 'up' => true  ]);
    Vote::create([ 'user_id' => 2, 'entry_id' => 8, 'up' => true  ]);
    Vote::create([ 'user_id' => 3, 'entry_id' => 8, 'up' => true  ]);
  }

}
