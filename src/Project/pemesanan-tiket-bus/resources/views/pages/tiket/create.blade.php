<x-admin-layout title="Tambah Bus">
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('jadwal.store')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label for="bus">Bus</label>
                                    <select name="bus" id="bus"
                                            class="form-select @error('bus') is-invalid @enderror">
                                        <option value="">Pilih Bus</option>
                                        @foreach($buses as $bus)
                                            <option value="{{$bus->id}}" @selected(old('bus'))>{{$bus->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('bus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kota_asal">Kota Asal</label>
                                    <select name="kota_asal" id="kota_asal"
                                            class="form-select @error('kota_asal') is-invalid @enderror">
                                        <option>Pilih Kota Asal</option>
                                        @foreach($regencies as $regency)
                                            <option
                                                value="{{$regency->id}}" @selected(old('kota_asal'))>{{$regency->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('kota_asal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="terminal_kota_asal">Terminal Kota Asal</label>
                                    <textarea name="terminal_kota_asal"
                                              class="text form-control @error('terminal_kota_asal') is-invalid @enderror"
                                              id="terminal_kota_asal"
                                              placeholder="Terminal Bus A">{{old('terminal_kota_asal')}}</textarea>
                                    @error('terminal_kota_asal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kota_tujuan">Kota Tujuan</label>
                                    <select name="kota_tujuan" id="kota_tujuan"
                                            class="form-select @error('kota_tujuan') is-invalid @enderror">
                                        <option>Pilih Kota Tujuan</option>
                                        @foreach($regencies as $regency)
                                            <option
                                                value="{{$regency->id}}" @selected(old('kota_tujuan'))>{{$regency->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('kota_tujuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="terminal_kota_tujuan">Terminal Kota Tujuan</label>
                                    <textarea name="terminal_kota_tujuan"
                                              class="text form-control @error('terminal_kota_tujuan') is-invalid @enderror"
                                              id="terminal_kota_tujuan"
                                              placeholder="Terminal Bus B">{{old('terminal_kota_tujuan')}}</textarea>
                                    @error('terminal_kota_tujuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kedatangan">Kedatangan</label>
                                    <input type="datetime-local" name="kedatangan"
                                           class="text form-control @error('kedatangan') is-invalid @enderror"
                                           id="kedatangan"
                                           placeholder="20" value="{{old('kedatangan')}}">
                                    @error('kedatangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="keberangkatan">Keberangkatan</label>
                                    <input type="datetime-local" name="keberangkatan"
                                           class="text form-control @error('keberangkatan') is-invalid @enderror"
                                           id="keberangkatan"
                                           placeholder="20" value="{{old('keberangkatan')}}">
                                    @error('keberangkatan')
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
