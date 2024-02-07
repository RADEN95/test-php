<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Models\Bank;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('pages.bank.index', [
            'banks' => Bank::get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank): Response
    {
        return response()->view('pages.bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankRequest $request, Bank $bank): RedirectResponse
    {
        $bank->update([
            'nama_bank' => $request->nama_bank,
            'nomor_bank' => $request->nomor_bank,
            'logo_bank' => $request->logo_bank ? $request->file('logo_bank')->store('assets/bank') : 'Tidak Ada Logo',
        ]);

        return to_route('bank.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankRequest $request): RedirectResponse
    {
        Bank::create([
            'nama_bank' => $request->nama_bank,
            'nomor_bank' => $request->nomor_bank,
            'logo_bank' => $request->logo_bank ? $request->file('logo_bank')->store('assets/bank') : 'Tidak Ada Logo',
        ]);

        return to_route('bank.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('pages.bank.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
