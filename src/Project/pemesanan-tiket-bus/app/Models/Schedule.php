<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'bus_id',
        'kapasitas',
        'kota_asal',
        'terminal_kota_asal',
        'kota_tujuan',
        'terminal_kota_tujuan',
        'kedatangan',
        'keberangkatan',
        'tarif',
    ];

    public function bus(): BelongsTo
    {
        return $this->belongsTo(Bus::class);
    }

    public function asal(): BelongsTo
    {
        return $this->belongsTo(Regency::class, 'kota_asal')->withDefault([
            'name' => '-',
        ]);
    }

    public function tujuan(): BelongsTo
    {
        return $this->belongsTo(Regency::class, 'kota_tujuan')->withDefault([
            'name' => '-',
        ]);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
