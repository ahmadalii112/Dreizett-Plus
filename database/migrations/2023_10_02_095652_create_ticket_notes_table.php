<?php

use App\Enums\TicketStatusEnum;
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
        Schema::create('ticket_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', [TicketStatusEnum::IN_PROGRESS->value, TicketStatusEnum::COMPLETED->value])->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_notes');
    }
};
