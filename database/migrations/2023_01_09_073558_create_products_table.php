<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('products')){
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('price');
                $table->text('sku');
                $table->unsignedBigInteger('brand_id');
                $table->string('brand_size');
                $table->string('chart_size');
                $table->string('weight');
                $table->string('condition');
                $table->text('colors');
                $table->string('size');
                $table->text('descriptions');
                $table->text('additional_info');
                $table->text('shipping');
                $table->text('thumbnail');
                $table->text('product_images');
                $table->text('in_stock');
                $table->text('slug');

                $table->timestamps();
            });
        }
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
