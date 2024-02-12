@php use App\Enums\StatusEnum; @endphp
<x-admin-layout>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Transaksi</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Bank</th>
                                        <th>Nama Pengirim</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Bukti Transfer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($transactions as $index => $item)
                                        <tr>
                                            <th>{{ $index + 1 }}</th>
                                            <td>{{ $item->kode_booking }}</td>
                                            <td>{{ $item->created_at->format('d-m-Y, H:i') }}</td>
                                            <td>{{ $item->bank_asal }}</td>
                                            <td>{{ $item->nama_pengirim }}</td>
                                            <td>{{ currencyIndo($item->total) }}</td>
                                            <td>
                                                <span @class([
                                                    'badge',
                                                    'bg-danger' => $item->status == StatusEnum::TIDAK_AKTIF->value,
                                                    'bg-warning' => $item->status == StatusEnum::PROSES->value,
                                                    'bg-success' => $item->status == StatusEnum::LUNAS->value,
                                                ])>{{ $item->status }}</span>
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/' . $item->bukti_transfer) }}" alt=""
                                                    class="img-transaction">
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <div class="alert alert-warning" role="alert">
                                                    Tidak ada data tiker
                                                </div>
                                            </td>

                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
