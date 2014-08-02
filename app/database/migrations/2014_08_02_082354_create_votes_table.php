<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration {

	public function up(){
		Schema::create('votes', function($table){
        $table->increments('id');
        $table->integer('user_id');
        $table->integer('entry_id');
        $table->boolean('up')->default(true);
        $table->timestamps();
    });
	}

	public function down(){
		Schema::drop('votes');
	}
}
