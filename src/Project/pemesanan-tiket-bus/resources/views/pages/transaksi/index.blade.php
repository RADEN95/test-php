@php use App\Enums\StatusEnum; @endphp
<x-admin-layout title="Transaksi">
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
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($transactions as $index => $item)
                                <tr>
                                    <th>{{$index+1}}</th>
                                    <td>{{$item->kode_booking}}</td>
                                    <td>{{$item->created_at->format('d-m-Y, H:i')}}</td>
                                    <td>{{$item->bank_asal}}</td>
                                    <td>{{$item->nama_pengirim}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>
                                    <span @class([
                                            'badge',
                                            'bg-danger' => $item->status == StatusEnum::PROSES->value,
                                            'bg-success' => $item->status == StatusEnum::LUNAS->value
                                        ])>{{$item->status}}</span>
                                    </td>
                                    <td>
                                        <img src="{{asset($item->bukti_transfer)}}" alt=""
                                             class="img-transaction">
                                    </td>
                                    <td>
                                        @if($item->status == StatusEnum::PROSES->value)
                                            <div class="d-inline-flex gap-2">
                                                <form action="{{route('transaksi.valid', $item->id)}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" class="btn btn-primary btn-sm">Valid</button>
                                                </form>
                                                <form action="#" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Tidak
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <span @class([
                                            'badge',
                                            'bg-danger' => $item->status == StatusEnum::PROSES->value,
                                            'bg-success' => $item->status == StatusEnum::LUNAS->value
                                        ])>{{$item->status}}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
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
</x-admin-layout>
