<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_records', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->integer('animal_id');
            $table->string('name');
            $table->string('dosage');
            $table->string('manufacture_date');
            $table->string('expiry_date');
            $table->string('signs_symptoms');
            $table->string('photo');
            $table->string('diagnosis');
            $table->string('treatment_duration');
            $table->string('type');
            $table->string('batch_number');
            $table->string('withholding_days');
            $table->string('date_safe_slaughter');
            $table->string('observations');
            $table->string('recommendations');
            $table->integer('vaccination_record');
            $table->integer('disease_pests_record');
            $table->integer('treatment_record');
            $table->integer('veterinary_record');
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
        Schema::dropIfExists('health_records');
    }
}
