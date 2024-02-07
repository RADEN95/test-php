<x-app-layout title="Home">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('img/hero.png')}}" class="d-block w-100 img-carousel" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/hero.png')}}" class="d-block w-100 img-carousel" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/hero.png')}}" class="d-block w-100 img-carousel" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8">
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
                            @foreach($chedules as $index => $item)
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
                                        <span class="fw-bold">{{$item->kapasitas}}/{{$item->schedules_count}}</span>
                                    </td>
                                    <td>
                                        <a href="{{route('booking.index', $item->id)}}" class="btn btn-primary btn-sm">Booking</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <form action="{{route('browse.index')}}" method="get" autocomplete="off">
                    <div>
                        <div class="h5">Cari Jadwal Mobil</div>
                        <div class="d-grid gap-2">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">Dari</span>
                                <select name="dari" class="form-select" aria-describedby="basic-addon1" id="dari">
                                    <option>Pilih</option>
                                    @foreach($regencies as $rg)
                                        <option value="{{$rg->id}}">{{$rg->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2">Ke</span>
                                <select name="tujuan" class="form-select" aria-describedby="basic-addon2">
                                    <option>Pilih</option>
                                    @foreach($regencies as $rg)
                                        <option value="{{$rg->id}}">{{$rg->name}}</option>
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

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('img/hero.png')}}" class="card-img" alt="">
                    <div class="card-body">
                        <h4>Super BUS</h4>
                        <div>
                            <div>Route</div>
                            <div>
                                Surabaya - Malang <span class="text-danger fw-medium text-decoration-line-through">Rp. 30.000</span>
                                <span class="text-success fw-bold">Rp. 25.000</span>
                            </div>
                            <div>
                                Malang - Surabaya <span class="text-primary fw-medium">Rp. 35.000</span>
                            </div>
                        </div>
                        <div class="d-grid mt-3">
                            <a href="{{route('booking.index', 'super-bus')}}" class="stretched-link rounded-4">Lorem
                                Ipsum</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
