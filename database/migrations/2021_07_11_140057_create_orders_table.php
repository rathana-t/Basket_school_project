<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('cart_id');
            $table->integer('pending')->default(0);
            $table->integer('processing')->default(0);
            $table->longText('processing_message')->nullable();
            $table->integer('delivery')->default(0);
            $table->longText('message')->nullable();
            $table->integer('user_cancel')->default(0);
            $table->integer('seller_cancel')->default(0);
            $table->integer('seller_remove_cancel')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
