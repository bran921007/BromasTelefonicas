<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('ID');
			$table->string('Name');
			$table->string('Last');
			$table->string('Company');
			$table->string('Email');
			$table->string('Password');
			$table->string('Website');
			$table->integer('Identification')->nullable();
			$table->integer('RNC');
			$table->integer('Phone');
			$table->integer('Mobile');
			$table->string('Direccion');
			$table->string('Ciudad');
			$table->enum('Estado', ['true', 'false']);
			$table->timestamps();
		});


		// User testing default
		DB::table('users')->insert(
		array(
			'Name'=>'Jhonn',
			'Last'=>'Rodriguez',
			'Company'=>'Comprame SRL',
			'Email'=>'admin@rojo.com',
			'Password'=>Hash::make('musica'),
			'Website'=>'http://comprame.me',
			'RNC'=>'2232131',
			'Phone'=>'8097163217',
			'Mobile'=>'8097163217',
			'Direccion'=>'Calle Victor Garido Puello',
			'Ciudad'=>'Santo Domingo',
			'Estado'=>'true'
			)
		);

	}




	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
