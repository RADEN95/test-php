<x-admin-layout title="Bank">
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <a href="{{route('bus.create')}}" class="btn btn-primary mb-3">Tambah Akun Bus</a>
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Tipe</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($buses as $index => $bus)
                                    <tr>
                                        <th>{{$index+1}}</th>
                                        <td>{{$bus->nama}}</td>
                                        <td>{{$bus->type}}</td>
                                        <td>
                                            <a href="{{route('bus.edit', $bus->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="alert alert-warning" role="alert">
                                                data bus kosong
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
