<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up ()
	{
		Schema::create('person', function (Blueprint $table)
		{
			$table->increments('person_id');
			$table->string('name');
			$table->string('surname');
			$table->date('birth_date');
			$table->string('genre');
			$table->string('phone');
			$table->string('work_phone');
			$table->string('email');
			$table->string('skype');
			$table->string('address');
			$table->string('profession');
			$table->string('civil_status');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down ()
	{
		Schema::drop('person');
	}

}
