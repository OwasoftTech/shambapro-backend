<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreedingRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeding_records', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->integer('animal_id');
            $table->string('date_last');
            $table->string('date_service');
            $table->string('time_service');
            $table->string('date_dying_off');
            $table->string('birth_date');
            $table->string('father_id');
            $table->string('mother_id');
            $table->string('sex');
            $table->string('weight');
            $table->string('no_new_born');
            $table->integer('service_register');
            $table->integer('calf_birth_register');
            $table->integer('piglet_birth_register');
            $table->integer('kid_birth_register');
            $table->integer('status');
            $table->integer('enterprise_id');
            $table->integer('user_id');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('breeding_records');
    }
}
