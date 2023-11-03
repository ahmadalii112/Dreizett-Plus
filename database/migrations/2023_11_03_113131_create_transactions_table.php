<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('connection_id')->constrained('connections')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tenant_id')->nullable()->constrained('tenants')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->string('payment_partner_name')->nullable();
            $table->string('reference_purpose')->nullable();
            $table->string('details')->nullable();
            $table->unsignedBigInteger('fin_api_account_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
