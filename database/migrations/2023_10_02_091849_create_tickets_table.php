<?php

use App\Enums\LocationTypeEnum;
use App\Enums\TicketStatusEnum;
use App\Enums\TicketTypeEnum;
use App\Enums\TradeTypeEnum;
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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->enum('location', array_map(fn ($case) => $case->value, LocationTypeEnum::cases()));
            $table->text('message')->nullable();
            $table->enum('ticket_type', array_map(fn ($case) => $case->value, TicketTypeEnum::cases()));
            $table->integer('dimensions')->nullable();
            $table->text('why_needed')->nullable();
            $table->text('solution_suggestion')->nullable();
            $table->enum('trade', array_map(fn ($case) => $case->value, TradeTypeEnum::cases()))->nullable();
            $table->text('problem_location')->nullable();
            $table->text('tried_to_solve')->nullable();
            $table->text('proposed_solution')->nullable();
            $table->text('expense_reason')->nullable();
            $table->text('notes')->nullable();
            $table->enum('ticket_status', array_map(fn ($case) => $case->value, TicketStatusEnum::cases()))->default(TicketStatusEnum::OPEN->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
