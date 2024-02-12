<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBusRequest;
use App\Models\Bus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('pages.bus.index', [
            'buses' => Bus::get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($bus): Response
    {
        $bus = Bus::findOrFail($bus);

        return response()->view('pages.bus.edit', compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $bus): RedirectResponse
    {
        $bus = Bus::findOrFail($bus);
        if ($request->file('gambar')) {
            Storage::delete($bus->gambar);
            $gambar = $request->file('gambar')->store('assets/bus');
        } else {
            $gambar = $bus->gambar;
        }
        $bus->update([
            'nama' => $request->nama,
            'nomor_polisi' => $request->nomor_polisi,
            'type' => $request->type,
            'kapasitas' => $request->kapasitas,
            'gambar' => $gambar,
        ]);

        return to_route('bus.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBusRequest $request): RedirectResponse
    {
        Bus::create([
            'nama' => $request->nama,
            'nomor_polisi' => $request->nomor_polisi,
            'type' => $request->type,
            'kapasitas' => $request->kapasitas,
            'gambar' => $request->file('gambar')
                ? $request->file('gambar')->store('assets/bus')
                : 'tidak ada gambar',
        ]);

        return to_route('bus.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('pages.bus.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus): Response
    {
        $bus = Bus::findOrFail($bus);
        $bus->delete();

        return response()->view('pages.bus.create');
    }
}
