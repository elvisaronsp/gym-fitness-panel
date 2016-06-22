<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerVisits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_visits', function (Blueprint $table) {
            $table->increments('customer_visit_id');
            $table->string('customer_visit_voucher_id');
            $table->integer('customer_visit_quantity');
            $table->dateTime('customer_visit_created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_visits');
    }
}
