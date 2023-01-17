<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilkRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milk_records', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('animal_id');
            $table->string('time');
            $table->string('milk_produced');
            $table->integer('heard_id');
            $table->string('milk_fed');
            $table->string('milk_consumed');
            $table->string('milk_loss');
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
        Schema::dropIfExists('milk_records');
    }
}
