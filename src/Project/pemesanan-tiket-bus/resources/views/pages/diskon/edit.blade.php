<x-admin-layout>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('diskon.update', $diskon->id)}}" method="post" autocomplete="off">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama"
                                           class="text form-control @error('nama') is-invalid @enderror" id="nama"
                                           placeholder="Diskon" value="{{old('nama') ?? $diskon->nama}}">
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="persen">Persen</label>
                                    <input type="text" name="persen"
                                           class="text form-control @error('persen') is-invalid @enderror"
                                           id="persen" value="{{old('persen') ?? $diskon->persen}}"
                                           placeholder="10">
                                    @error('persen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
