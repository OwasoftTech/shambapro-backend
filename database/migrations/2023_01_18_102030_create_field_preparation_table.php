<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldPreparationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_preparation', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('service_provider');
            $table->string('type');
            $table->string('result');
            $table->string('recommendation');
            $table->integer('soil_test');
            $table->string('acreage');
            $table->string('done_by');
            $table->integer('land_preparation');
            $table->string('name');
            $table->string('quantity');
            $table->string('ingredient');
            $table->string('batch_no');
            $table->string('dosage');
            $table->string('supplier_name');
            $table->string('expiry_date');
            $table->integer('soil_amendment');
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
        Schema::dropIfExists('field_preparation');
    }
}
