<x-admin-layout title="Tambah Bus">
    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('jadwal.update', $jadwal->id) }}" method="post" autocomplete="off">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="bus">Bus</label>
                                    <select name="bus" id="bus"
                                        class="bus form-select @error('bus') is-invalid @enderror">
                                        <option value="">Pilih Bus</option>
                                        @foreach ($buses as $bus)
                                            <option value="{{ $bus->id }}" @selected(old('bus') ?? $bus->id == $jadwal->bus_id ? 'selected' : '')>
                                                {{ $bus->nama }}</option>
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
                                        class="asal form-select @error('kota_asal') is-invalid @enderror">
                                        <option>Pilih Kota Asal</option>
                                        @foreach ($regencies as $regency)
                                            <option value="{{ $regency->id }}" @selected(old('kota_asal') ?? $regency->id == $jadwal->kota_asal ? 'selected' : '')>
                                                {{ $regency->name }}</option>
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
                                    <textarea name="terminal_kota_asal" class="text form-control @error('terminal_kota_asal') is-invalid @enderror"
                                        id="terminal_kota_asal" placeholder="Terminal Bus A">{{ old('terminal_kota_asal') ?? $jadwal->terminal_kota_asal }}</textarea>
                                    @error('terminal_kota_asal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kota_tujuan">Kota Tujuan</label>
                                    <select name="kota_tujuan" id="kota_tujuan"
                                        class="tujuan form-select @error('kota_tujuan') is-invalid @enderror">
                                        <option>Pilih Kota Tujuan</option>
                                        @foreach ($regencies as $regency)
                                            <option {{ $regency->id == $jadwal->kota_tujuan ? 'selected' : '' }}
                                                value="{{ $regency->id }}" @selected(old('kota_tujuan') ?? $regency->id == $jadwal->kota_tujuan ? 'selected' : '')>
                                                {{ $regency->name }}</option>
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
                                    <textarea name="terminal_kota_tujuan" class="text form-control @error('terminal_kota_tujuan') is-invalid @enderror"
                                        id="terminal_kota_tujuan" placeholder="Terminal Bus B">{{ old('terminal_kota_tujuan') ?? $jadwal->terminal_kota_tujuan }}</textarea>
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
                                        id="kedatangan" placeholder="20"
                                        value="{{ old('kedatangan') ?? $jadwal->kedatangan }}">
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
                                        id="keberangkatan" placeholder="20"
                                        value="{{ old('keberangkatan') ?? $jadwal->keberangkatan }}">
                                    @error('keberangkatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tarif">Tarif</label>
                                    <input type="text" name="tarif"
                                        class="text form-control @error('tarif') is-invalid @enderror" id="tarif"
                                        placeholder="30000" value="{{ old('tarif') ?? $jadwal->tarif }}">
                                    @error('tarif')
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
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.bus').select2();
                $('.asal').select2();
                $('.tujuan').select2();
            });
        </script>
    @endpush
</x-admin-layout>
