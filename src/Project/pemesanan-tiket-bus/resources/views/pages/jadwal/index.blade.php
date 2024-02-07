<x-admin-layout title="Bank">
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <a href="{{route('jadwal.create')}}" class="btn btn-primary mb-3">Tambah Jadwal</a>
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
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($schedules as $index => $jadwal)
                                    <tr>
                                        <th>{{$index+1}}</th>
                                        <td>
                                            <div class="d-grid">
                                                {{$jadwal->bus->nama}}
                                                <small
                                                    class="text-secondary fw-light">{{$jadwal->bus->nomor_polisi}}</small>
                                            </div>
                                        </td>
                                        <td>{{$jadwal->kedatangan}}</td>
                                        <td>{{$jadwal->keberangkatan}}</td>
                                        <td>{{$jadwal->kapasitas}} Kursi</td>
                                        <td>{{$jadwal->tarif}}</td>
                                        <td>
                                            <a href="{{route('jadwal.edit', $jadwal->id)}}"
                                               class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
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
