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
        Schema::create('finance_transactions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('type', 10);
            $table->string('unit', 30);
            $table->string('category', 60);
            $table->string('description', 100);
            $table->unsignedBigInteger('amount');
            $table->boolean('is_sample')->default(false);
            $table->timestamps();

            $table->index(['date', 'unit', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_transactions');
    }
};
