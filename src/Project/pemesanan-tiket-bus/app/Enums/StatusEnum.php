<?php

namespace App\Enums;

enum StatusEnum: string
{
    case AKTIF = 'AKTIF';
    case HABIS = 'HABIS';
    case TIDAK_AKTIF = 'TIDAK_AKTIF';
    case PROSES = 'PROSES';
    case LUNAS = 'LUNAS';
}
