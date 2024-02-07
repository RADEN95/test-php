<x-admin-layout>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('bank.store')}}" method="post" autocomplete="off"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="bank">Nama Bank</label>
                                    <input type="text" name="nama_bank"
                                           class="text form-control @error('nama_bank') is-invalid @enderror" id="bank"
                                           placeholder="BRI" value="{{old('nama_bank')}}">
                                    @error('nama_bank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_bank">Nomor Bank</label>
                                    <input type="text" name="nomor_bank"
                                           class="text form-control @error('nomor_bank') is-invalid @enderror"
                                           id="nomor_bank" value="{{old('nomor_bank')}}"
                                           placeholder="01283102281921">
                                    @error('nomor_bank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="logo">Logo</label>
                                    <input type="file" name="logo_bank" accept="image/*"
                                           class="text form-control @error('logo_bank') is-invalid @enderror"
                                           id="logo">
                                    @error('logo_bank')
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
