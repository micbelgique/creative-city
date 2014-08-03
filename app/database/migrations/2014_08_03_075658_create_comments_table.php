<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {
	public function up() {
		Schema::create('comments', function($table){
        $table->increments('id');
        $table->integer('user_id');
        $table->integer('entry_id');
        $table->text('content')->nullable();
        $table->timestamps();
    });
	}

	public function down() {
		Schema::drop('comments');
	}
}
