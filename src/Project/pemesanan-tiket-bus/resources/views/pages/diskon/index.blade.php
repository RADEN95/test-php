<x-admin-layout title="Bank">
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <a href="{{ route('diskon.create') }}" class="btn btn-primary mb-3">Tambah Diskon</a>
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Diskon</th>
                                        <th>Persen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($discounts as $index => $item)
                                        <tr>
                                            <th>{{ $index + 1 }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->persen }}</td>
                                            <td>
                                                <a href="{{ route('diskon.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('diskon.destroy', $item->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
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
