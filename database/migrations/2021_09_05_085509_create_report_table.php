<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('seller_id');
            $table->integer('pro_id');
            $table->string('code_product');
            $table->string('pro_name');
            $table->string('pro_price',20);
            $table->integer('quantity_order');
            $table->string('total_price',20);
            $table->string('commission',20);
            $table->string('commission_price',20);
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
        Schema::table('reports', function (Blueprint $table) {
            //
        });
    }
}
