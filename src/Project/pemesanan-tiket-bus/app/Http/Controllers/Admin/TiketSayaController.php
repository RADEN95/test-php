<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Response;

class TiketSayaController extends Controller
{
    public function myTicket(): Response
    {
        return response()->view('pages.transaksi.my-tiket', [
            'tickets' => Ticket::with([
                'user',
                'schedule',
                'schedule.bus'
            ])
                ->whereUserId(auth()->id())
                ->get()
        ]);
    }

    public function myTransaction($slug): Response
    {
        return response()->view('pages.transaksi.my-transaksi', [
            'transactions' => Transaction::whereTicketId($slug)->with('ticket')->get()
        ]);
    }
}
