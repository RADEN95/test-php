<x-app-layout title="Detail Booking">
    <section>
        <div class="container">
            <div class="d-flex justify-content-between mb-4 mt-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('home')}}"
                               class="text-decoration-none fw-medium text-secondary">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <span class="fw-light">Booking</span>
                        </li>
                    </ol>
                </nav>
                <div>
                    <h3 class="text-primary fw-bold">
                        <span class="border-bottom">Booking</span>
                    </h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow border-0 overflow-hidden">
                        <img src="https://source.unsplash.com/random/?bus" class="card-img rounded-bottom-0" alt="">
                        <div class="card-body">
                            <h4 class="text-primary fw-bold">Super BUS</h4>
                            <div>
                                <div>
                                    Surabaya - Malang <span class="text-danger fw-medium text-decoration-line-through">Rp. 30.000</span>
                                    <span class="text-success fw-bold">Rp. 25.000</span>
                                </div>
                                <div>
                                    <p>Tanggal Berangkat <span
                                            class="text-primary fw-medium">7/02/2024, 13.00 WIB</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-warning border-0 bg-gradient" role="alert">
                        Pastikan email yang diinput adalah email aktif, karena tiket akan dikirim ke alamat email
                        tersebut
                    </div>
                    <form action="{{route('booking.store')}}" method="post" autocomplete="off">
                        @csrf
                        <input type="hidden" name="jadwal" value="{{$booking->id}}">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-pencil"></i></span>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                   placeholder="Nama" aria-label="Nama" value="{{old('nama') ?? auth()->user()->name}}"
                                   aria-describedby="basic-addon1">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Email" aria-label="Email"
                                   value="{{old('email') ?? auth()->user()->email}}" readonly
                                   aria-describedby="basic-addon2">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">
                                <i class="bi bi-123"></i>
                            </span>
                            <input type="text" name="diskon"
                                   class="form-control @error('diskon') is-invalid @enderror"
                                   placeholder="Diskon" aria-label="Promo" value="{{old('diskon')}}"
                                   aria-describedby="basic-addon3">
                            @error('diskon')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary rounded-5">Countinue Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
