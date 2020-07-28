<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockIncomePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_income_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->string('amount');
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
        Schema::dropIfExists('stock_income_payments');
    }
}
