<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crop_field', function (Blueprint $table) {
            $table->id();
             $table->integer('enterprise_id');
            $table->string('field_name');
            $table->string('field_size');
            $table->string('date_of_planting');
            $table->string('no_of_plants');
            $table->string('plants_type');
            $table->string('variety');
            $table->string('crop_type');
            $table->string('croping_system');
            $table->string('watering_system');
            $table->string('cultivation_system');
            $table->string('season_length');
             $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); 
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crop_field');
    }
}
