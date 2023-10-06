<?php

namespace App\Models;

use App\Enums\LocationTypeEnum;
use App\Enums\TicketStatusEnum;
use App\Enums\TicketTypeEnum;
use App\Enums\TradeTypeEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'location',
        'message',
        'ticket_type',
        'dimensions',
        'why_needed',
        'solution_suggestion',
        'trade',
        'problem_location',
        'tried_to_solve',
        'proposed_solution',
        'expense_reason',
        'notes',
        'ticket_status',
    ];

    protected $casts = [
        'ticket_type' => TicketTypeEnum::class,
        'location' => LocationTypeEnum::class,
        'ticket_status' => TicketStatusEnum::class,
        'trade' => TradeTypeEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(TicketNote::class);
    }

    protected function ticketStatusColor(): Attribute
    {
        return Attribute::make(
            get: fn () => [
                TicketStatusEnum::IN_PROGRESS->value => 'indigo',
                TicketStatusEnum::OPEN->value => 'green',
                TicketStatusEnum::COMPLETED->value => 'red',
            ][$this->ticket_status->value] ?? 'green'
        );
    }
}
