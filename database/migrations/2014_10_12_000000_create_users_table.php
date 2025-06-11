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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('role', ['admin', 'petani'])->default('petani');
            $table->unsignedBigInteger('user_created_id')->nullable();
            $table->string('user_created_name')->nullable();
            $table->unsignedBigInteger('user_updated_id')->nullable();
            $table->string('user_updated_name')->nullable();
            $table->timestamps();

            $table->foreign('user_created_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('user_updated_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
