<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->integer('heard_id');
            $table->string('bread_type');
            $table->string('animal_name');
            $table->string('animal_sex');
            $table->string('animal_color');
            $table->string('date_of_birth');
            $table->string('date_of_purchase');
            $table->string('father_id');
            $table->string('mother_id');
            $table->string('photo');
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
        Schema::dropIfExists('animals');
    }
}
