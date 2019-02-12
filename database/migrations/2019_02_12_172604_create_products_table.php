<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Product_ID')->unique();
            $table->string('Product_Name_English')->nullable();
            $table->string('Product_Name_Tamil')->nullable();
            $table->string('Cost_Price');
            $table->string('Expense')->nullable();
            $table->string('Selling_Price')->nullable();
            $table->string('Selling_Price_With_Tax')->nullable();
            $table->string('CGST')->nullable();
            $table->string('SGST')->nullable();
            $table->string('CESS')->nullable();
            $table->string('minimun_quantity')->nullable();
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
        Schema::dropIfExists('products');
    }
}
