<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('password', 255);
			$table->string('phone', 15);
			$table->string('email', 100);
			$table->timestamps();
			$table->date('dob');
			$table->integer('blood_type_id');
			$table->date('last_donation_date');
			$table->integer('city_id');
			$table->string('pin_code');
			$table->boolean('is_activated')->default(False);
			$table->string('api_token', 60)->unique()->nullable();

		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
