<?php

class PersonTableSeeder extends Seeder
{
	/*
	 * Seed the table 'user'
	 */

	public function run()
	{
		DB::table('person')->delete();

		$persons = array(
			array(
				'name' => 'Maria',
				'surname' => 'Jesus',
				'birth_date' => '1965-02-10',
				'genre' => 'female',
				'phone' => '961234567',
				'work_phone' => '291123456',
				'email' => 'maria@host.domain',
				'skype' => 'mariajesus',
				'address' => 'Estrada Monumental, número 3',
				'profession' => 'Professora',
				'civil_status' => 'married'
			),
			array(
				'name' => 'João',
				'surname' => 'Coelho',
				'birth_date' => '1955-07-03',
				'genre' => 'male',
				'phone' => '967654321',
				'work_phone' => '291654321',
				'email' => 'joao@host.domain',
				'skype' => 'joaocoelho',
				'address' => 'Estrada do Campo - bloco 7',
				'profession' => 'Socateiro',
				'civil_status' => 'single'
			),
			array(
				'name' => 'Joana',
				'surname' => 'Mendes',
				'birth_date' => '1983-05-23',
				'genre' => 'female',
				'phone' => '967412365',
				'work_phone' => '291741236',
				'email' => 'joana@host.domain',
				'skype' => 'joana_mendes',
				'address' => 'Rua do caminho da estrada - porta 10',
				'profession' => 'Secretária',
				'civil_status' => 'single'
			),
			array(
				'name' => 'Ricardo',
				'surname' => 'Baptista',
				'birth_date' => '1991-12-11',
				'genre' => 'male',
				'phone' => '969632145',
				'work_phone' => '291963214',
				'email' => 'ricardo@host.domain',
				'skype' => '',
				'address' => 'Cabeço de Ferro, porta 126',
				'profession' => 'Mecânico',
				'civil_status' => 'married'
			)
		);

		DB::table('person')->insert($persons);
	}
} 