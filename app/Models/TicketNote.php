<?php

namespace App\Models;

use App\Enums\TicketStatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'user_id',
        'status',
        'note',
    ];

    protected $casts = [
        'status' => TicketStatusEnum::class,
    ];

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function statusColor(): Attribute
    {
        return Attribute::make(
            get: fn () => [
                TicketStatusEnum::IN_PROGRESS->value => 'indigo',
                TicketStatusEnum::COMPLETED->value => 'red',
            ][$this->status->value] ?? 'indigo'
        );
    }
}
