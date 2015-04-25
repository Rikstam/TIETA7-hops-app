<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

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
					'studentNumber' => '555545',
					'email' => 'pepsi.pena@gmail.com',
					'password' => bcrypt('jaffamies')
					)
				);

				User::create(
				array(
					'firstName' => 'Timppa ',
					'lastName'=> 'Testimies',
					'telephone'=> '343434343',
					'address' => 'katu 5',
					'studentNumber' => '5555',
					'email' => 'pepsi.pen5a@gmail.com',
					'password' => bcrypt('jaffamies')
					)
				);

				User::create(
				array(
					'firstName' => 'Aku',
					'lastName'=> 'Hirviniemi',
					'telephone'=> '34343432433',
					'address' => 'katu 52',
					'studentNumber' => '24534552',
					'email' => 'pepsi.pena2@gmail.com',
					'password' => bcrypt('jaffamies')
					)
				);

				User::create(
				array(
					'firstName' => 'Sanna',
					'lastName'=> 'suutari',
					'telephone'=> '343434343',
					'address' => 'katu 53',
					'studentNumber' => '12353',
					'email' => 'pepsi.pena3@gmail.com',
					'password' => bcrypt('jaffamies')
					)
				);

				User::create(
				array(
					'firstName' => 'Keijo',
					'lastName'=> 'Keksi',
					'telephone'=> '343434343',
					'address' => 'katu 53',
					'studentNumber' => '9898353',
					'email' => 'keksi3@gmail.com',
					'password' => bcrypt('jaffamies')
					)
				);

				User::create(
				array(
					'firstName' => 'Tony',
					'lastName'=> 'Shalhoub',
					'telephone'=> '343434343',
					'address' => 'katu 53',
					'studentNumber' => '2298353',
					'email' => 'tony.s@gmail.com',
					'password' => bcrypt('jaffamies')
					)
				);

				User::create(
				array(
					'firstName' => 'Musta',
					'lastName'=> 'Naamio',
					'telephone'=> '343434343',
					'address' => 'katu 53',
					'studentNumber' => '77298353',
					'email' => 'musta.naamio@gmail.com',
					'password' => bcrypt('jaffamies')
					)
				);

				User::create(
				array(
					'firstName' => 'Aulis',
					'lastName'=> 'Gerlander',
					'telephone'=> '343434343',
					'address' => 'katu 53',
					'studentNumber' => '88298353',
					'email' => 'aulisg@gmail.com',
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
