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
        Schema::table('pay_pal_transactions', function (Blueprint $table) {
            $table->float('tp_comision');
            $table->float('tp_autor_net_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pay_pal_transactions', function (Blueprint $table) {
            $table->dropColumn('tp_comision');
            $table->dropColumn('tp_autor_net_amount');
        });
    }
};
