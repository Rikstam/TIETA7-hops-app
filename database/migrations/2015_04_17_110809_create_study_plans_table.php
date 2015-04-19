<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyPlansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('study_plans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->text('positive_feedback')->nullable();
			$table->text('negative_feedback')->nullable();
			$table->text('academic_year');


			$table->boolean('is_active')->default(true);
			$table->boolean('has_job')->default(false);
			$table->text('job_description')->nullable();
			$table->text('job_type')->nullable();

			$table->integer('job_hours')->nullable();
			$table->text('job_explanation')->nullable();

			$table->text('interest_in_own_field')->nullable();
			$table->text('optional_interest')->nullable();

			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('study_plans');
	}

}
