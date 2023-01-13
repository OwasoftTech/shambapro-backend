<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flock', function (Blueprint $table) {
            $table->id();
            $table->string('flock_name');
            $table->string('bread');
            $table->string('hachting_date');
            $table->string('number_of_birds');
            $table->string('source_of_birds')->nullable();
            $table->string('poultry_house_name')->nullable();
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
        Schema::dropIfExists('folk');
    }
}
