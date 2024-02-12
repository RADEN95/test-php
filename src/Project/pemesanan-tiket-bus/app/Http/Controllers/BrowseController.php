<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrowseController extends Controller
{
    public function index(Request $request): Response
    {
        $jadwal = Schedule::query()
            ->with(['bus', 'asal', 'tujuan'])
            ->withCount('tickets')
            ->where('kota_asal', 'LIKE', "%{$request->get('dari')}%")
            ->orWhere('kota_tujuan', 'LIKE', "%{$request->get('tujuan')}%")
            ->whereDate('keberangkatan', ">=", Carbon::now()->format('d-m-Y, H:i'))
            ->get();
        return response()->view('browse', [
            'regencies' => Regency::oldest('name')->get(),
            'chedules' => $jadwal
        ]);
    }
}
