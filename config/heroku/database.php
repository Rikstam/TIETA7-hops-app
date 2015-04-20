<?php
if ($app->environment('heroku')){
$url = parse_url(getenv("HEROKU_POSTGRESQL_ORANGE_URL"));

$host = $url['host'];
$username = $url['user'];
$password = $url['pass'];
$database = substr($url['path'], 1);

return [



	'fetch' => PDO::FETCH_CLASS,



	'default' => 'pgsql',

	'connections' => [

      'pgsql' => [
			'driver'   => 'pgsql',
			'host'     =>  $host,
			'database' => $database,
			'username' => $username,
			'password' => $password,
			'charset'  => 'utf8',
			'prefix'   => '',
			'schema'   => 'public',
		],



	],



	'migrations' => 'migrations',



	'redis' => [

		'cluster' => false,

		'default' => [
			'host'     => '127.0.0.1',
			'port'     => 6379,
			'database' => 0,
		],

	],

];
}
