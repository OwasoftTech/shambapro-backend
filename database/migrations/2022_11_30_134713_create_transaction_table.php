<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_date');
            $table->integer('category_id');
            $table->string('transaction_name');
            $table->string('item');
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->integer('amount');
            $table->integer('payment_method');
            $table->string('photo');
            $table->integer('type');
            $table->integer('user_id');
            $table->integer('createdby');
            $table->integer('updatedby')->default(0);
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
        Schema::dropIfExists('transaction');
    }
}
