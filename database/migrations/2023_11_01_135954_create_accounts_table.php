<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('connection_id')->nullable()->constrained('connections')->cascadeOnDelete();
            $table->string('account_holder_name')->nullable();
            $table->string('account_id')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('type')->nullable();
            $table->string('balance')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('iban')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
