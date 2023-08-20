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
            $table->integer('book_id');
            $table->integer('autor_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pay_pal_transactions', function (Blueprint $table) {
            $table->dropColumn('book_id');
            $table->dropColumn('autor_id');
        });
    }
};
