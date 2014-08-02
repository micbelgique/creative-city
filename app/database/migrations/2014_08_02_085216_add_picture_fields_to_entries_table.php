<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPictureFieldsToEntriesTable extends Migration {

	public function up() {
		Schema::table('entries', function(Blueprint $table) {

			$table->string('picture_file_name')->nullable();
			$table->integer('picture_file_size')->nullable();
			$table->string('picture_content_type')->nullable();
			$table->timestamp('picture_updated_at')->nullable();

		});

	}

	public function down() {
		Schema::table('entries', function(Blueprint $table) {

			$table->dropColumn('picture_file_name');
			$table->dropColumn('picture_file_size');
			$table->dropColumn('picture_content_type');
			$table->dropColumn('picture_updated_at');

		});
	}
}
