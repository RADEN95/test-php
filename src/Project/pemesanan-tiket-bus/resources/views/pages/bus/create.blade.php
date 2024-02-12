<x-admin-layout title="Tambah Bus">

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('bus.store') }}" method="post" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama"
                                        class="text form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Bus A" value="{{ old('nama') }}">
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_polisi">Nomor Polisi</label>
                                    <input type="text" name="nomor_polisi"
                                        class="text form-control @error('nomor_polisi') is-invalid @enderror"
                                        id="nomor_polisi" value="{{ old('nomor_polisi') }}" placeholder="AB-8239-CA">
                                    @error('nomor_polisi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="type">Type</label>
                                    <input type="text" name="type"
                                        class="text form-control @error('type') is-invalid @enderror" id="type"
                                        placeholder="Type A" value="{{ old('type') }}">
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kapasitas">Kapasitas</label>
                                    <input type="text" name="kapasitas"
                                        class="text form-control @error('kapasitas') is-invalid @enderror"
                                        id="kapasitas" placeholder="20" value="{{ old('kapasitas') }}">
                                    @error('kapasitas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gambar">Gambar/Foto</label>
                                    <input type="file" name="gambar" accept="image/*"
                                        class="text form-control @error('gambar') is-invalid @enderror" id="gambar">
                                    @error('gambar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-admin-layout>
