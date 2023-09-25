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
        Schema::create('residential_communities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable();
            $table->decimal('care_allowance', 10, 2)->nullable()->comment('Allowance amount in €');
            $table->decimal('household_allowance', 10, 2)->nullable()->comment('Allowance amount in €');
            $table->integer('deduction_amount')->nullable()->comment('Amount depending on the level of care, 1-5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residential_communities');
    }
};
