<x-admin-layout title="Bank">
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <a href="{{route('bank.create')}}" class="btn btn-primary mb-3">Tambah Akun Bank</a>
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Bank</th>
                                    <th>Nomor Bank</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($banks as $index => $bank)
                                    <tr>
                                        <th>{{$index+1}}</th>
                                        <td>{{$bank->nama_bank}}</td>
                                        <td>{{$bank->nomor_bank}}</td>
                                        <td>
                                            <a href="{{route('bank.edit', $bank->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="alert alert-warning" role="alert">
                                                data bank kosong
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
