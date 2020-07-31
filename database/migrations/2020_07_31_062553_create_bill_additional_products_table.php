<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillAdditionalProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_additional_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill_id')->unsigned();
            $table->foreign('bill_id')->references('id')->on('bills');
            $table->string('name')->nullable();
            $table->string('qty')->nullable();
            $table->string('amount')->nullable();
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
        Schema::dropIfExists('bill_additional_products');
    }
}
