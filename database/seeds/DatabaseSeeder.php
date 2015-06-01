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
        $this->call('CountriesSeeder');
        $this->command->info('Seeded the countries!');

		// $this->call('UserTableSeeder');
        $this->call('RolesSeeder');
        $this->command->info('Seeded the roles');
	}

}
