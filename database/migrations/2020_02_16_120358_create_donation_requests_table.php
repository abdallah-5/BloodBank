<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('patient_name', 100);
			$table->integer('patient_age');
			$table->integer('blood_type_id');
			$table->integer('bags_num');
			$table->string('hospital_name', 100);
			$table->string('hospital_address', 100);
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
			$table->integer('city_id');
			$table->string('phone', 15);
			$table->text('notes');
			$table->integer('client_id');
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}