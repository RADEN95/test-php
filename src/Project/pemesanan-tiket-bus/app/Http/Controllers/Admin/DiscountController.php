<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('pages.diskon.index', [
            'discounts' => Discount::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'persen' => 'required|numeric'
        ]);

        Discount::create($request->all());

        return to_route('diskon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('pages.diskon.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $diskon): Response
    {
        return response()->view('pages.diskon.edit', compact('diskon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discount $diskon): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'persen' => 'required|numeric'
        ]);

        $diskon->update($request->all());

        return to_route('diskon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $diskon): RedirectResponse
    {
        $diskon->delete();
        return to_route('diskon.index');
    }
}
