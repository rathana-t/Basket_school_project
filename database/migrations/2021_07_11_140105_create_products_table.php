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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->text('description')->nullable();
            $table->float('price',10,2);
            $table->string('stock', 15);
            $table->integer('top_buy')->nullable();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('s_cat_id');
            $table->integer('seller_id');
            $table->integer('completed')->default(0);
            $table->string('img_product', 1024);
            $table->string('sub_img1', 1024)->nullable();
            $table->string('sub_img2', 1024)->nullable();
            $table->string('sub_img3', 1024)->nullable();
            $table->string('sub_img4', 1024)->nullable();
            $table->string('sub_img5', 1024)->nullable();
            $table->string('sub_img6', 1024)->nullable();
            $table->string('sub_img7', 1024)->nullable();
            $table->integer('count')->default(1);
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
