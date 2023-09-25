<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id')->constrained('shared_apartments')->onDelete('cascade')->onUpdate('cascade');
            $table->string('room_number')->nullable();
            $table->decimal('square_meter_room', 10, 2)->nullable();
            $table->decimal('square_meter_common_area', 10, 2)->nullable();
            $table->decimal('basic_rent', 10, 2)->nullable();
            $table->decimal('additional_costs', 10, 2)->nullable();
            $table->decimal('heating_costs', 10, 2)->nullable();
            $table->decimal('electricity_costs', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
