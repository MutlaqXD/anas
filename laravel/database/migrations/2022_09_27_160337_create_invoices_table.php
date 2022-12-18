<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('tran_ref');
            $table->string('tran_type');
            $table->string('invoice_type');
            $table->string('cart_description');
            $table->string('cart_currency');
            $table->string('cart_amount');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_ip');
            $table->string('payment_response_status');
            $table->string('payment_response_code');
            $table->string('payment_response_message');
            $table->string('payment_transaction_time');
            $table->string('payment_info_payment_method');
            $table->string('payment_info_card_type');
            $table->string('payment_info_payment_description');
            $table->string('payment_info_expiryMonth');
            $table->string('payment_info_expiryYear');
            $table->string('success');
            $table->string('transaction_id');
            $table->string('message');
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
        Schema::dropIfExists('invoices');
    }
};
