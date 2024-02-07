<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookingController extends Controller
{
    public function index($slug): Response
    {
        return response()->view('booking', [
            'booking' => Schedule::find($slug),
        ]);
    }

    public function payment($slug): Response
    {
        return response()->view('booking-payment', [
            'payment' => Ticket::find($slug)
                ->load([
                    'schedule',
                    'schedule.bus',
                    'schedule.asal',
                    'schedule.tujuan'
                ]),
        ]);
    }

    public function paymentStore(Request $request, $slug): RedirectResponse
    {
        $request->validate([
            'bank_asal' => 'required',
            'nama_pengirim' => 'required',
            'bukti_transfer' => 'required|image',
            'diskon' => 'nullable|exists:discounts,nama'
        ]);

        $tiket = Ticket::findOrFail($slug)->load('schedule');

        Transaction::create([
            'ticket_id' => $tiket->id,
            'discount_id' => $request->diskon,
            'kode_booking' => time(),
            'bank_asal' => $request->bank_asal,
            'nama_pengirim' => $request->nama_pengirim,
            'bukti_transfer' => $request->file('bukti_transfer')->store('assets/transfer'),
            'total' => $tiket->schedule->tarif,
        ]);
        return to_route('tiket-saya');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
        ]);

        $tiket = Ticket::create([
            'user_id' => auth()->id(),
            'schedule_id' => $request->jadwal,
        ]);

        return to_route('booking.payment', $tiket->id);
    }

 
}
