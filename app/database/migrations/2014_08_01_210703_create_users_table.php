<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up(){
		Schema::create('users', function($table){
        $table->increments('id');
        $table->string('token')->unique();
        $table->string('name');
        $table->string('email');
        $table->timestamps();
    });
	}

	public function down(){
		Schema::drop('users');
	}

}
