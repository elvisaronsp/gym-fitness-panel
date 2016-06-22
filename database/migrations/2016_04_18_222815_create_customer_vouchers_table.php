<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_vouchers', function (Blueprint $table) {
            $table->increments('customer_voucher_id');
            $table->string('customer_voucher_name');
            $table->integer('customer_voucher_customer_id');
            $table->tinyInteger('customer_voucher_type');
            $table->tinyInteger('customer_voucher_visit_limit')->nullable();
            $table->dateTime('customer_voucher_created_at');
            $table->dateTime('customer_voucher_payed_at')->nullable();
            $table->dateTime('customer_voucher_expired_at')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_vouchers');
    }
}
