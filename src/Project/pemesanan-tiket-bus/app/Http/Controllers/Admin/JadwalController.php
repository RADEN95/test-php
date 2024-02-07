<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Models\Bus;
use App\Models\Regency;
use App\Models\Schedule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('pages.jadwal.index', [
            'schedules' => Schedule::with(['bus'])->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJadwalRequest $request): RedirectResponse
    {
        $kapasitas = Bus::find($request->bus);
        Schedule::create([
            'bus_id' => $request->bus,
            'kapasitas' => $kapasitas->kapasitas,
            'kota_asal' => $request->kota_asal,
            'terminal_kota_asal' => $request->terminal_kota_asal,
            'kota_tujuan' => $request->kota_tujuan,
            'terminal_kota_tujuan' => $request->terminal_kota_tujuan,
            'kedatangan' => $request->kedatangan,
            'keberangkatan' => $request->keberangkatan,
            'tarif' => $request->tarif,
        ]);

        return to_route('jadwal.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('pages.jadwal.create', [
            'buses' => Bus::oldest('nama')->get(),
            'regencies' => Regency::oldest('name')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $jadwal): Response
    {
        return response()->view('pages.jadwal.edit', [
            'jadwal' => $jadwal,
            'buses' => Bus::oldest('nama')->get(),
            'regencies' => Regency::oldest('name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJadwalRequest $request, Schedule $jadwal): RedirectResponse
    {
        $jadwal->update([
            'bus_id' => $request->bus,
            'kota_asal' => $request->kota_asal,
            'terminal_kota_asal' => $request->terminal_kota_asal,
            'kota_tujuan' => $request->kota_tujuan,
            'terminal_kota_tujuan' => $request->terminal_kota_tujuan,
            'kedatangan' => $request->kedatangan,
            'keberangkatan' => $request->keberangkatan,
            'tarif' => $request->tarif,
        ]);

        return to_route('jadwal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
