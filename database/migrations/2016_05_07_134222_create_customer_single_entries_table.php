<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerSingleEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_single_entries', function (Blueprint $table) {
            $table->increments('customer_single_entry_id');
            $table->integer('customer_single_entry_quantity');
            $table->datetime('customer_single_entry_created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_single_entries');
    }
}
