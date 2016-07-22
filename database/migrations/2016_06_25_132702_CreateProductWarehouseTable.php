<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_warehouses', function (Blueprint $table) {
            $table->increments('product_wareouse_id');
            $table->integer('product_warehouse_product_id')->unsigned();
            $table->smallInteger('product_warehouse_quantity')->default(0);
            $table->datetime('product_warehouse_created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_warehouses');
    }
}
