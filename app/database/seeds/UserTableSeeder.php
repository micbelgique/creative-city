<?php

class UserTableSeeder extends Seeder {

  public function run() {
    DB::table('users')->delete();
    User::create([ 'email' => 'bayart@lookabox.be',          'name' => 'François' ]);
    User::create([ 'email' => 'toussaint@trad.com',          'name' => 'Didier'   ]);
    User::create([ 'email' => 'michael.hoste@gmail.com',     'name' => 'Michael'  ]);
    User::create([ 'email' => 'aurelien.malisart@gmail.com', 'name' => 'Aurels'   ]);
  }

}
