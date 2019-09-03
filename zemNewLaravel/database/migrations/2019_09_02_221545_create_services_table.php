<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateServicesTable.
 */
class CreateServicesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name',50);
            $table->string('email',80)->unique();
            $table->string('phone',11);
            $table->date('birth')->nullable();
            $table->boolval('marcar');
            $table->boolval('facul');
            $table->intval('salarial')->nullable();
            $table->string('habilidades',200)->nullable();

			$table->timestamps();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('services');
	}
}
