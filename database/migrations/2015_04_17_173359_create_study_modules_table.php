<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('study_modules', function(Blueprint $table)
		{
		$table->increments('id');
		$table->timestamps();

		//$table->string('module_code', 12);
		$table->string('module_name', 255);
		$table->string('subject', 255);
		$table->enum('semester_name', ['autumn', 'spring']);
		$table->decimal('credits', 5 , 1);
		$table->boolean('accomplished')->default(false);
		$table->integer('semester_year');
		//$table->date('planned_accomplishment');


		$table->integer('studyplan_id')->unsigned()->nullable();
		$table->foreign('studyplan_id')->references('id')->on('study_plans')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

			Schema::drop('study_modules');

	}

}
