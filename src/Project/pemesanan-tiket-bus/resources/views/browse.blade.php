<x-app-layout title="Browse">
    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow border-0 bg-gradient border-top border-primary">
                        <div class="card-body text-center">

                            <form action="{{ route('browse.index') }}" method="get">
                                <div class="d-inline-flex gap-2 ">
                                    <div>
                                        <select name="dari" id="dari" class="asal form-select">
                                            <option value="">Pilih</option>
                                            @foreach ($regencies as $rg)
                                                <option @selected(old('dari')) value="{{ $rg->id }}">
                                                    {{ $rg->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <select name="tujuan" id="tujuan" class="tujuan form-select">
                                            <option value="">Pilih</option>
                                            @foreach ($regencies as $rg)
                                                <option @selected(old('tujuan')) value="{{ $rg->id }}">
                                                    {{ $rg->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-outline-primary">Cari Bus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="card">
                            <div class="card-body">
                                <x-alert />
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
                                                <th>{{ $index + 1 }}</th>
                                                <td>{{ $item->bus->nama }}</td>
                                                <td>
                                                    {{ $item->terminal_kota_asal }} -
                                                    <span class="text-capitalize">{{ $item->asal->name }}</span>
                                                    <div>
                                                        <small
                                                            class="text-primary fw-bold">{{ $item->kedatangan }}</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $item->terminal_kota_tujuan }} -
                                                    <span class="text-capitalize">{{ $item->tujuan->name }}</span>
                                                    <div>
                                                        <smal class="text-primary fw-bold">{{ $item->keberangkatan }}
                                                        </smal>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span
                                                        class="fw-bold">{{ $item->bus->kapasitas }}/{{ $item->tickets_count }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('booking.index', $item->id) }}"
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
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.asal').select2();
                $('.tujuan').select2();
            });
        </script>
    @endpush
</x-app-layout>
