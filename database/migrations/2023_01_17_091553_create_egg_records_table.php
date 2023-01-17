<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEggRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egg_records', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('egg_produced');
            $table->string('egg_sold');
            $table->string('egg_broken');
            $table->string('egg_consumed');
            $table->string('egg_poor_quality');
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
        Schema::dropIfExists('egg_records');
    }
}
