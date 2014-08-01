<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entries', function($table)
    {
        $table->increments('id');
        $table->string('token')->unique();
        $table->string('kind');
        $table->string('title');
        $table->text('description');
        $table->dateTime('start_date');
        $table->dateTime('end_date');
        $table->string('url');
        $table->string('author_name');
        $table->string('author_email');
        $table->timestamps();
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entries');
	}

}
