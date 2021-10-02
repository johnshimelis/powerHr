<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
	public function up()
	{
		Schema::create('employee', function (Blueprint $table) {
			$table->id('emp_id');
			$table->integer('organization_id');
			$table->string('name');
			$table->string('email');
			$table->bigInteger('phone');
			$table->string('sun', 150)->nullable()->default('NULL');
			$table->string('mon', 150)->nullable()->default('NULL');
			$table->string('tue', 150)->nullable()->default('NULL');
			$table->string('wed', 150)->nullable()->default('NULL');
			$table->string('thu', 150)->nullable()->default('NULL');
			$table->string('fri', 150)->nullable()->default('NULL');
			$table->string('sat', 150)->nullable()->default('NULL');
			$table->tinyInteger('status')->default('1');
			$table->tinyInteger('profession')->default();
			$table->tinyInteger('isdelete')->default('0');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('employee');
	}
}
