<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTokensTable extends Migration {

	public function up()
	{
		Schema::create('tokens', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->enum('type', array('android', 'ios'));
			$table->string('token', 255);
			$table->unSignedInteger('client_id');
			$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

		});
	}

	public function down()
	{
		Schema::drop('tokens');
	}
}
