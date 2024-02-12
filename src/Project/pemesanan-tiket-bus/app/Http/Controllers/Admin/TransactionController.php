<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    public function index($slug): Response
    {
        return response()->view('pages.transaksi.index', [
            'transactions' => Transaction::whereTicketId($slug)->with('ticket')->get()
        ]);
    }

    public function valid($slug): RedirectResponse
    {

        $transaksi = Transaction::whereStatus(StatusEnum::PROSES->value)
            ->findOrFail($slug)
            ->load('ticket');

        $transaksi->update([
            'status' => StatusEnum::LUNAS->value
        ]);
        $transaksi->ticket()->update([
            'status' => StatusEnum::LUNAS->value
        ]);
        return to_route('tiket.index');
    }

    public function tidakValid($slug)
    {
        $transaksi = Transaction::whereStatus(StatusEnum::PROSES->value)
            ->findOrFail($slug)
            ->load('ticket');

        $transaksi->update([
            'status' => StatusEnum::TIDAK_AKTIF->value
        ]);
        $transaksi->ticket()->update([
            'status' => StatusEnum::TIDAK_AKTIF->value
        ]);
        return to_route('tiket.index');
    }
}
