<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bankaccounts', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('organisation_id')->unsigned();
            $table->string('iban');
            $table->string('bic');
            $table->foreign('organisation_id')->references('id')->on('organisations')->onDelete('cascade');
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
		Schema::drop('bankaccounts');
	}

}
