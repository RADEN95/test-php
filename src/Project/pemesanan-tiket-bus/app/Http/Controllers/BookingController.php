<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Schedule;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookingController extends Controller
{
    public function index($slug): Response|RedirectResponse
    {
        $booking = Schedule::with([
            'bus',
            'asal',
            'tujuan'
        ])
            ->withCount('tickets')
            ->find($slug);
        if ($booking->tickets_count >= $booking->bus->kapasitas) {
            return back()->with('error', "{$booking->bus->nama} Sudah Penuh");
        }

        return response()->view('booking', [
            'booking' => $booking,
        ]);
    }

    public function payment($slug): Response
    {
        return response()->view('booking-payment', [
            'payment' => Ticket::find($slug)
                ->load([
                    'discount',
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
        ]);

        $tiket = Ticket::findOrFail($slug)
            ->load([
                'schedule', 'transactions'
            ]);

        $hasilPersen = ($tiket->discount->persen * $tiket->schedule->tarif) / 100;
        $total = $tiket->schedule->tarif - $hasilPersen;


        $tiket->transactions()->create([
            'ticket_id' => $tiket->id,
            'kode_booking' => time(),
            'bank_asal' => $request->bank_asal,
            'nama_pengirim' => $request->nama_pengirim,
            'bukti_transfer' => $request->file('bukti_transfer')->store('assets/transfer'),
            'total' => $total,
        ]);
        return to_route('tiket-saya');
    }

    public function store(Request $request) //: RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'diskon' => 'nullable|exists:discounts,nama'
        ]);

        $diskon = Discount::where('nama', $request->diskon)->first('id');
        if ($diskon) {
            $diskon = $diskon->id;
        } else {
            $diskon = null;
        }

        $tiket = Ticket::create([
            'user_id' => auth()->id(),
            'schedule_id' => $request->jadwal,
            'discount_id' => $diskon
        ]);

        return to_route('booking.payment', $tiket->id);
    }
}
