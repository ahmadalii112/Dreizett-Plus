<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shared_apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('community_id')->nullable()->constrained('residential_communities')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shared_apartments');
    }
};
