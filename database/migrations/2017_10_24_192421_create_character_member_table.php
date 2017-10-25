<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCharacterMemberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('character_member', function(Blueprint $table)
		{
			$table->integer('character_id')->index();
			$table->integer('member_id')->index();
			$table->integer('gear');
			$table->integer('star')->nullable();
			$table->integer('level');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('character_member');
	}

}
