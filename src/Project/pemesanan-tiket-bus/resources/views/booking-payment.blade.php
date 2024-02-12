<x-app-layout>
    <section>
        <div class="container">
            <div>
                <h4 class="fw-bold">Payment</h4>
                <div class="alert alert-warning" role="alert">Harap selesaikan pembelian tiket dengan mengupload bukti
                    pembayaran
                </div>
            </div>
            <div class="mt-5 mb-4">
                <table class="table">
                    <tr>
                        <th>BUS</th>
                        <td>{{ $payment->schedule->bus->nama }}</td>
                    </tr>
                    <tr>
                        <th>Dari</th>
                        <td>{{ $payment->schedule->terminal_kota_asal }} - {{ $payment->schedule->asal->name }}</td>
                    </tr>
                    <tr>
                        <th>Tujuan</th>
                        <td>{{ $payment->schedule->terminal_kota_tujuan }} - {{ $payment->schedule->tujuan->name }}</td>
                    </tr>
                    <tr>
                        <th>Kedatangan</th>
                        <td>{{ $payment->schedule->kedatangan }}</td>
                    </tr>
                    <tr>
                        <th>Keberangkatan</th>
                        <td>{{ $payment->schedule->keberangkatan }}</td>
                    </tr>
                </table>
            </div>
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <h5 class="fw-bold text-primary">Total Pembayaran</h5>
                    <table class="table">
                        <tr>
                            <th>Diskon</th>
                            <td>{{ $payment->discount->persen ? $payment->discount->persen . '%' : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Potongan</th>
                            <td>
                                @php
                                    $potongan = ($payment->discount->persen * $payment->schedule->tarif) / 100;
                                @endphp
                                {{ currencyIndo($potongan) }}
                            </td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>
                                @php
                                    $hasilPersen = ($payment->discount->persen * $payment->schedule->tarif) / 100;
                                @endphp

                                <div class="fw-bold"> {{ currencyIndo($payment->schedule->tarif - $hasilPersen) }}
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="d-flex gap-3 mt-5">
                        <div><img src="{{ asset('img/bca.png') }}" alt=""></div>
                        <div>
                            <div class="fw-bold">Bank Central Asia</div>
                            <div class="fw-medium">120312012</div>
                            <div class="fw-medium">LaraBus</div>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div><img src="{{ asset('img/mandiri.png') }}" alt=""></div>
                        <div>
                            <div class="fw-bold">Bank Mandiri</div>
                            <div class="fw-medium">120312012</div>
                            <div class="fw-medium">LaraBus</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow border-0 bg-gradient mt-4 rounded-bottom-0">
                        <div class="card-header bg-body-tertiary fw-bold h5 text-primary">
                            Transfer Pembayaran
                        </div>
                        <div class="card-body">
                            <form action="{{ route('booking.payment.store', $payment->id) }}" method="post"
                                enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label for="bukti-transfer" class="form-label">Upload Bukti Transfer</label>
                                    <input type="file" name="bukti_transfer"
                                        class="form-control @error('bukti_transfer') is-invalid @enderror"
                                        id="bukti-transfer" value="{{ old('bukti_transfer') }}" accept="image/*">
                                    @error('bukti_transfer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="asal_bank" class="form-label">Asal Bank</label>
                                    <input type="text" name="bank_asal"
                                        class="form-control @error('bank_asal') is-invalid @enderror" id="asal_bank"
                                        placeholder="Asal Bank" value="{{ old('bank_asal') }}">
                                    @error('bank_asal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
                                    <input type="text" name="nama_pengirim"
                                        class="form-control @error('nama_pengirim') is-invalid @enderror"
                                        id="nama_pengirim" placeholder="Nama Pengirim"
                                        value="{{ old('nama_pengirim') }}">
                                    @error('nama_pengirim')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Continue Booking</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
