<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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

				User::create(
				array(
					'firstName' => 'Pepsi',
					'lastName'=> 'Pena',
					'telephone'=> '343434343',
					'address' => 'katu 5',
					'studentNumber' => '00005',
					'email' => 'pepsi.pena@gmail.com',
					'password' => bcrypt('jaffamies')
					)
				);

				User::create(
				array(
					'firstName' => 'Pepsi',
					'lastName'=> 'Pena',
					'telephone'=> '343434343',
					'address' => 'katu 5',
					'studentNumber' => '00005',
					'email' => 'pepsi.pen5a@gmail.com',
					'password' => bcrypt('jaffamies')
					)
				);

				User::create(
				array(
					'firstName' => 'Pepsi2',
					'lastName'=> 'Pena',
					'telephone'=> '34343432433',
					'address' => 'katu 52',
					'studentNumber' => '000052',
					'email' => 'pepsi.pena2@gmail.com',
					'password' => bcrypt('jaffamies')
					)
				);

				User::create(
				array(
					'firstName' => 'Pepsi3',
					'lastName'=> 'Pena',
					'telephone'=> '343434343',
					'address' => 'katu 53',
					'studentNumber' => '000053',
					'email' => 'pepsi.pena3@gmail.com',
					'password' => bcrypt('jaffamies')
					)
				);

				User::create(
				array(
					'firstName' => 'Timo',
					'lastName'=> 'Tuutor',
					'telephone'=> '343434343',
					'address' => 'katu 53',
					'email' => 'timo.tuutori@gmail.com',
					'password' => bcrypt('jaffamies'),
					'role'		=> 'tutor'
					)
				);

				User::create(
				array(
					'firstName' => 'Yrjö',
					'lastName'=> 'Ylituutori',
					'telephone'=> '3434534343',
					'address' => 'katu 15',

					'email' => 'yrjo@gmail.com',
					'password' => bcrypt('jaffamies'),
					'role' => 'admin'
					)
				);



	}
}
