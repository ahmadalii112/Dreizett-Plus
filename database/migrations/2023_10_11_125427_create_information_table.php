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
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('informationable_id');
            $table->string('informationable_type');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('salutation')->nullable();
            $table->string('house_number')->nullable();
            $table->string('street')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
