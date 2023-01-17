<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmStoreHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_store_history', function (Blueprint $table) {
            $table->id();
            $table->string('farm_store_id');
            $table->integer('quantity');
            $table->integer('created_by');
            $table->timestamp('created_at'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farm_store_history');
    }
}
