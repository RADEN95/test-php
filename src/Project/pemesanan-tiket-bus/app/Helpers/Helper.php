<?php

use Carbon\Carbon;

function currencyIndo($curr)
{
    return 'Rp.' . number_format($curr, 0, '.', '.');
}

function tanggal($tanggal)
{
    return Carbon::parse($tanggal)->translatedFormat('l, d/m/Y');
}

function tanggalWaktu($tanggal)
{
    return Carbon::parse($tanggal)->translatedFormat('l, d/m/Y H:i');
}

function jam($jam)
{
    return Carbon::parse($jam)->translatedFormat('H:i');
}
