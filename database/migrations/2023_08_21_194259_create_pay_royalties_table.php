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
        Schema::create('pay_royalties', function (Blueprint $table) {
            $table->id();
            $table->string("tp_autor_id")->nullable();
            $table->string("pp_transaction_id")->nullable();
            $table->string("pp_status")->nullable();
            $table->string("pp_payments_currency_code")->nullable();
            $table->string("pp_payments_amount")->nullable();
            $table->string("pp_payments_fee")->nullable();
            $table->string("pp_payments_net_amount")->nullable();
            $table->string("pp_payments_create_time")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_royalties');
    }
};
