<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration {

	public function up(){
		Schema::create('entries', function($table){
        $table->increments('id');
        $table->string('token')->unique();
        $table->string('kind')->default('article');
        $table->string('title')->default('');
        $table->text('content')->nullable();
        $table->dateTime('start_date')->nullable();
        $table->dateTime('end_date')->nullable();
        $table->string('url')->default('');
        $table->string('author_name')->default('');
        $table->string('author_email')->default('');
        $table->timestamps();
    });
	}

	public function down(){
		Schema::drop('entries');
	}

}
