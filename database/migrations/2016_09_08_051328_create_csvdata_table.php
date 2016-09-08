<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
class CreateCsvdataTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'csvData', function ($table) {
			$table->integer ( 'id' );
			$table->string ( 'firstname' );
			$table->string ( 'lastname' );
			$table->string ( 'email' );
			$table->string ( 'gender' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'csvData' );
	}
}
