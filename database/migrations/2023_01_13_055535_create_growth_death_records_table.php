<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrowthDeathRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('growth_death_records', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->integer('animal_id');
            $table->string('weight');
            $table->string('photo');
            $table->integer('weekly_growth_register');
            $table->string('cause_of_death');
            $table->string('disposal_method');
            $table->integer('death_register');
            $table->string('kill_weight');
            $table->string('dressed_weight');
            $table->string('meat_quality');
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
        Schema::dropIfExists('growth_death_records');
    }
}
