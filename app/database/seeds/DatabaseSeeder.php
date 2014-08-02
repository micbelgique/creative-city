<?php

class DatabaseSeeder extends Seeder {

	public function run() {
		Eloquent::unguard();
		$this->call('EntryTableSeeder');
    $this->call('UserTableSeeder');
    $this->call('VoteTableSeeder');
	}

}
