<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeysTable extends Migration
{
    public function up()
    {
        Schema::create('keys', function (Blueprint $table) {

		$table->id();
		$table->string('label',250)->default('System');
		$table->string('key',40);
		$table->integer('level',2);
		$table->tinyInteger('ignore_limits',1)->default('0');
        $table->tinyInteger('is_private_key',1)->default('0');
		$table->string('ip_addresses')->nullable()->default('NULL');
		$table->integer('date_created',11);

        });
    }

    public function down()
    {
        Schema::dropIfExists('keys');
    }
}