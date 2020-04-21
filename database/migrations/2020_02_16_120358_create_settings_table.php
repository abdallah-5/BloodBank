<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('notification_settings_text');
			$table->text('about_us');
			$table->string('phone', 15);
			$table->string('email', 30);
			$table->string('fb_link', 100);
			$table->string('tw_link', 100);
			$table->string('youtube_link', 100);
			$table->string('inst_link', 100);
			$table->string('whatsapp_link', 100);
			$table->string('google_plus_link', 100);
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}