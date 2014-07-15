<?php

class UserTableSeeder extends Seeder
{
	/*
	 * Seed the table 'user'
	 */

	public function run()
	{
		DB::table('user')->delete();

		$users = array(
			array(
				'password' => Hash::make('admin'),
				'email' => 'admin@lnn.com',
			),
			array(
				'password' => Hash::make('user1'),
				'email' => 'user1@lnn.com',
			),
			array(
				'password' => Hash::make('user2'),
				'email' => 'user2@lnn.com',
			)
		);

		DB::table('user')->insert($users);
	}
} 