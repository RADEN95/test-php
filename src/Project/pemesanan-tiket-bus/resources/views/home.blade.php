<x-app-layout title="Home">
    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/hero.png') }}" class="d-block w-100 img-carousel" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/hero.png') }}" class="d-block w-100 img-carousel" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/hero.png') }}" class="d-block w-100 img-carousel" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8">
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
                                @foreach ($chedules as $index => $item)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td>{{ $item->bus->nama }}</td>
                                        <td>
                                            {{ $item->terminal_kota_asal }} -
                                            <span class="text-capitalize">{{ $item->asal->name }}</span>
                                            <div>
                                                <small class="text-primary fw-bold">{{ $item->kedatangan }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $item->terminal_kota_tujuan }} -
                                            <span class="text-capitalize">{{ $item->tujuan->name }}</span>
                                            <div>
                                                <smal class="text-primary fw-bold">{{ $item->keberangkatan }}</smal>
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <form action="{{ route('browse.index') }}" method="get" autocomplete="off">
                    <div>
                        <div class="h5">Cari Jadwal Mobil</div>
                        <div class="d-grid gap-2">
                            <div class="mb-2">
                                <label class="form-label" id="basic-addon1">Dari</label>
                                <select name="dari" class="asal form-select" aria-describedby="basic-addon1"
                                    id="dari">
                                    <option>Pilih</option>
                                    @foreach ($regencies as $rg)
                                        <option value="{{ $rg->id }}">{{ $rg->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label" id="basic-addon2">Ke</label>
                                <select name="tujuan" class="tujuan form-select" aria-describedby="basic-addon2">
                                    <option>Pilih</option>
                                    @foreach ($regencies as $rg)
                                        <option value="{{ $rg->id }}">{{ $rg->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr class="border-secondary">
                    <div>
                        <button type="submit" class="btn btn-outline-primary rounded-4">Cari Bus</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
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
