<?php

class EntryTableSeeder extends Seeder {

  public function run() {
    DB::table('entries')->delete();
    Entry::create([ 'title' => 'Ta mère' ]);
    Entry::create([ 'title' => 'Ta soeur' ]);
    Entry::create([ 'title' => 'Ton frère' ]);
  }

}
