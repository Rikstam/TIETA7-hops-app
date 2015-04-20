<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstName');
			$table->string('lastName');
			$table->string('telephone');
			$table->text('address');

			$table->string('email')->unique();
			$table->string('password', 60);
			$table->integer('studentNumber')->unique()->nullable();

			$table->string('role', 50)->default('student');
			$table->rememberToken();
			$table->timestamps();

			$table->integer('tutor_id')->nullable();
			$table->foreign('tutor_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
