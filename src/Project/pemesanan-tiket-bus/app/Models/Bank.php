<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nama_bank',
        'nomor_bank',
        'logo_bank',
    ];
}
