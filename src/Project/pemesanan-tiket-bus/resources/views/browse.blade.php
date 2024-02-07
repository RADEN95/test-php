<x-app-layout>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow border-0 bg-gradient border-top border-primary">
                        <div class="card-body">
                            <form action="{{route('browse.index')}}" method="get">
                                <div class="input-group mb-3">
                                    <select name="dari" id="" class="form-select">
                                        <option value="">Pilih</option>
                                        @foreach($regencies as $rg)
                                            <option @selected(old('dari')) value="{{$rg->id}}">{{$rg->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-text">
                                        <i class="bi bi-arrow-right-square"></i>
                                    </span>
                                    <select name="tujuan" id="" class="form-select">
                                        <option value="">Pilih</option>
                                        @foreach($regencies as $rg)
                                            <option @selected(old('tujuan')) value="{{$rg->id}}">{{$rg->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-outline-primary">Cari Bus</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>BIS</th>
                                        <th>Dari</th>
                                        <th>Tujuan</th>
                                        <th>Kuota</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($chedules as $index => $item)
                                        <tr>
                                            <th>{{$index+1}}</th>
                                            <td>{{$item->bus->nama}}</td>
                                            <td>
                                                {{$item->terminal_kota_asal}} -
                                                <span
                                                    class="text-capitalize">{{$item->asal->name}}</span>
                                                <div>
                                                    <small class="text-primary fw-bold">{{$item->kedatangan}}</small>
                                                </div>
                                            </td>
                                            <td>
                                                {{$item->terminal_kota_tujuan}} -
                                                <span
                                                    class="text-capitalize">{{$item->tujuan->name}}</span>
                                                <div>
                                                    <smal class="text-primary fw-bold">{{$item->keberangkatan}}</smal>
                                                </div>
                                            </td>
                                            <td>
                                                <span
                                                    class="fw-bold">{{$item->kapasitas}}/{{$item->schedules_count}}</span>
                                            </td>
                                            <td>
                                                <a href="{{route('booking.index', $item->id)}}"
                                                   class="btn btn-primary btn-sm">Booking</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="6">
                                                <div class="alert alert-danger" role="alert">
                                                    tidak ditemukan
                                                </div>
                                            </th>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
