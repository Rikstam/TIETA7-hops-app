<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

				$faker = Faker::create();
				$faker->seed(12345);

				//create  1st year students
				for ($i=0; $i < 20; $i++) {

					$firstname = $faker->firstNameMale;
					$lastname = $faker->lastName;
					$email_extension = '@student.uta.fi';

					User::create(
					array(
						'firstName' => $firstname ,
						'lastName'=>  $lastname,
						'telephone'=> '343434343',
						'address' => $faker->address,
						'studentNumber' => 1000 + $i,
						'email' => 	strtolower($firstname) . '.' . strtolower($lastname) . $email_extension ,
						'password' => bcrypt('jaffamies' . '1'),
						'created_at' =>  Carbon::createFromDate(2014, 9 , 11)->toDateTimeString()
						)
					);
				}

				//create  2nd year students
				for ($i=0; $i < 20; $i++) {

					$firstname = $faker->firstNameMale;
					$lastname = $faker->lastName;
					$email_extension = '@student.uta.fi';

					User::create(
					array(
						'firstName' => $firstname ,
						'lastName'=>  $lastname,
						'telephone'=> '343434343',
						'address' => $faker->address,
						'studentNumber' => 2000 + $i,
						'email' => 	strtolower($firstname) . '.' . strtolower($lastname) . $email_extension ,
						'password' => bcrypt('jaffamies' . '2'),
						'created_at' =>  Carbon::createFromDate(2013,9,22)->toDateTimeString()
						)
					);
				}

				//create  3rd year students
				for ($i=0; $i < 20; $i++) {


					$firstname = $faker->firstNameMale;
					$lastname = $faker->lastName;
					$email_extension = '@student.uta.fi';

					User::create(
					array(
						'firstName' => $firstname ,
						'lastName'=>  $lastname,
						'telephone'=> '343434343',
						'address' => $faker->address,
						'studentNumber' => 3000 + $i,
						'email' => 	strtolower($firstname) . '.' . strtolower($lastname) . $email_extension ,
						'password' => bcrypt('jaffamies' . '3'),
						'created_at' =>  Carbon::createFromDate(2012,9,22)->toDateTimeString()
						)
					);
				}




				//create tutors
				User::create(
				array(
					'firstName' => 'Timo',
					'lastName'=> 'Tuutor',
					'telephone'=> '343434343',
					'address' => 'katu 53',
					'email' => 'timo.tuutori@gmail.com',
					'password' => bcrypt('jaffamies'),
					'role'		=> 'teacher-tutor'
					)
				);

				User::create(
				array(
					'firstName' => 'Tiina',
					'lastName'=> 'Tuutor',
					'telephone'=> '343434343',
					'address' => 'katu 53',
					'email' => 'tiina.tuutori@gmail.com',
					'password' => bcrypt('jaffamies'),
					'role'		=> 'teacher-tutor'
					)
				);

				User::create(
				array(
					'firstName' => 'Tino',
					'lastName'=> 'Tuutor',
					'telephone'=> '343434343',
					'address' => 'katu 53',
					'email' => 'tino.tuutori@gmail.com',
					'password' => bcrypt('jaffamies'),
					'role'		=> 'teacher-tutor'
					)
				);

				User::create(
				array(
					'firstName' => 'Teppo',
					'lastName'=> 'Tuutor',
					'telephone'=> '343434343',
					'address' => 'katu 53',
					'email' => 'teppo.tuutori@gmail.com',
					'password' => bcrypt('jaffamies'),
					'role'		=> 'teacher-tutor'
					)
				);


				//create admin
				User::create(
				array(
					'firstName' => 'Yrjö',
					'lastName'=> 'Ylituutori',
					'telephone'=> '3434534343',
					'address' => 'katu 15',

					'email' => 'yrjo@gmail.com',
					'password' => bcrypt('jaffamies'),
					'role' => 'master-tutor'
					)
				);



	}
}
