<?php

class DatabaseSeeder extends Seeder {
	protected $tables = [
		'users',
		'categories',
		'votes',
		'admins',
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->truncate();

		$this->call('UsersTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('AdminsTableSeeder');
		$this->call('VotesTableSeeder');
	}

	private function truncate()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		foreach ($this->tables as $table)
		{
			DB::table($table)->truncate();
		}

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
