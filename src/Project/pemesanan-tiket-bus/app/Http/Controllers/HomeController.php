<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
//        return Carbon::now()->format('d-m-Y');
        $jadwal = Schedule::query()
            ->with(['bus', 'asal', 'tujuan'])
            ->withCount('schedules')
            ->whereDate('keberangkatan', '>=', Carbon::now())
            ->get();

        return response()->view('home', [
            'regencies' => Regency::oldest('name')->get(),
            'chedules' => $jadwal
        ]);
    }
}
