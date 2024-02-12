<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'schedule_id',
        'discount_id',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => '-',
        ]);
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class)->withDefault([
            'bus_id' => '-',
        ]);
    }


    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class)->withDefault([
            'nama' => '-'
        ]);
    }
    /**
     * Get all of the transactions for the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'ticket_id', 'id');
    }
}
