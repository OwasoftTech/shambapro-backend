<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedingRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeding_records', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->integer('heard_id');
            $table->string('time');
            $table->string('feed_type');
            $table->integer('quantity');
            $table->string('left_over');
            $table->string('spoilage');
            $table->integer('daily_feeding_record');
            $table->string('grazing_from');
            $table->string('grazing_to');
            $table->string('paddock_id');
            $table->integer('daily_grazing_record');
            $table->string('animal_id');
            $table->string('weaning_weight');
            $table->integer('daily_weaning_record');
            $table->integer('daily_feed_consumption');
            $table->integer('daily_water_consumption');
            $table->integer('status');
            $table->integer('enterprise_id');
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
        Schema::dropIfExists('feeding_records');
    }
}
