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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('autor');
            $table->text('coautores')->nullable();
            $table->timestamp('publish_date')->nullable();
            $table->text('detail');
            $table->string('isbn')->nullable();
            $table->string('language')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('discount')->nullable();
            $table->integer('categorie')->default(1);
            $table->text('slug')->nullable();
            $table->integer('status')->default(2);
            $table->string('file_path')->nullable();
            $table->timestamp('deleted')->nullable();
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
