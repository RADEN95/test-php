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
                                        <th>Bus</th>
                                        <th>Kedatangan</th>
                                        <th>Keberangkatan</th>
                                        <th>Kuota</th>
                                        <th>Tarif</th>
                                        <th>Status</th>
                                        <th>Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($tickets as $index => $tiker)
                                        <tr>
                                            <th>{{ $index + 1 }}</th>
                                            <td>
                                                <div class="d-grid">
                                                    {{ $tiker->schedule->bus->nama }}
                                                    <small class="text-secondary fw-light">
                                                        {{ $tiker->schedule->bus->nomor_polisi }}
                                                    </small>
                                                </div>
                                            </td>
                                            <td>{{ $tiker->schedule->kedatangan }}</td>
                                            <td>{{ $tiker->schedule->keberangkatan }}</td>
                                            <td>{{ $tiker->schedule->bus->kapasitas }} Kursi</td>
                                            <td>{{ currencyIndo($tiker->schedule->tarif) }}</td>
                                            <td>
                                                <span @class([
                                                    'badge',
                                                    'bg-danger' => $tiker->status == StatusEnum::TIDAK_AKTIF->value,
                                                    'bg-warning' => $tiker->status == StatusEnum::PROSES->value,
                                                    'bg-success' => $tiker->status == StatusEnum::LUNAS->value,
                                                ])>{{ $tiker->status }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('transaksi-saya', $tiker->id) }}"
                                                    class="btn btn-primary btn-sm">Transaksi</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">
                                                <div class="alert alert-warning" role="alert">
                                                    data bus kosong
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
