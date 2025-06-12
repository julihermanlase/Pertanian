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
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('variety');
            $table->date('start_date');
            $table->date('est_harvest_date');
            $table->unsignedBigInteger('user_created_id')->nullable();
            $table->string('user_created_name')->nullable();
            $table->unsignedBigInteger('user_updated_id')->nullable();
            $table->string('user_update_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crops');
    }
};
