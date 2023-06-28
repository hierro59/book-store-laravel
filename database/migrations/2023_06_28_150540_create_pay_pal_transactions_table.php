<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pay_pal_transactions', function (Blueprint $table) {
            $table->id();
            $table->string("pp_transaction_id")->nullable();
            $table->string("pp_status")->nullable();
            $table->string("cu_email_address")->nullable();
            $table->string("cu_account_id")->nullable();
            $table->string("cu_name")->nullable();
            $table->string("tp_reference_id")->nullable();
            $table->string("pp_payments_id")->nullable();
            $table->string("pp_payments_status")->nullable();
            $table->string("pp_payments_amount")->nullable();
            $table->string("pp_payments_currency_code")->nullable();
            $table->string("pp_payments_paypal_fee")->nullable();
            $table->string("pp_payments_net_amount")->nullable();
            $table->string("pp_payments_create_time")->nullable();
            $table->string("pp_payments_update_time")->nullable();
            $table->longText("pp_response");
            $table->timestamps()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_pal_transactions');
    }
};
