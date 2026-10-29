<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_number', 40)->unique();
            $table->string('name', 150)->index();
            $table->string('unit', 30)->index();
            $table->string('class_name', 80)->nullable();
            $table->string('gender', 20);
            $table->string('status', 20)->default('Aktif')->index();
            $table->string('guardian_name', 150)->nullable();
            $table->string('guardian_phone', 30)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
