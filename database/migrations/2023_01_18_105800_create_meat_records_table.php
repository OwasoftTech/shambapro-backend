<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeatRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meat_records', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('dead');
            $table->string('removed');
            $table->string('sold');
            $table->string('farm_consumption');
            $table->integer('bird_record');
            $table->string('remarks');
            $table->integer('production_record');
            $table->string('animal_id');
            $table->string('no_of_birds');
            $table->string('kill_weight');
            $table->string('dressed_weight');
            $table->string('quality');
            $table->integer('slaughter_record');
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
        Schema::dropIfExists('meat_records');
    }
}
