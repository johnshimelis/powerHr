<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTherapistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('therapists', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> surveycontroller update
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title');
            $table->boolean('gender');
            $table->date('date_of_birth');

            $table->string('profile_photo_path');
<<<<<<< HEAD
            $table->string('cv_path');
            $table->string('alma_mater');
            $table->date('license_issue_date');

            $table->text('bio')->nullable();

            $table->boolean('is_approved')->default(0);
            $table->time('work_hour_begin');
            $table->time('work_hour_end');
            $table->foreignId('user_id');
            // $table->unsignedBigInteger('user_id');
            // $table->references('id')->on('users');
=======
            $table->string('cv_path');
            $table->string('alma_mater');
>>>>>>> SurveyApi
=======
            $table->string('cv_path');
            $table->string('alma_mater');
            $table->date('license_issue_date');

            $table->text('bio')->nullable();

            $table->boolean('is_approved')->default(0);
            $table->time('work_hour_begin');
            $table->time('work_hour_end');
            $table->foreignId('user_id');
>>>>>>> surveycontroller update
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
        Schema::dropIfExists('therapists');
    }
}