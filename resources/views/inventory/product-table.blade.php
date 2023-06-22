<table class="table">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nama product</th>
            <th scope="col">harga product</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->nama_product }}</td>
            <td>Rp.{{ number_format($item->harga_product) }}</td>
            <td class="d-flex gap-2">
                <a href="/inventori/{{ $item->id }}/edit" class="btn badge bg-warning p-2 d-inline">Edit</a>
                <form action="/inventori/{{ $item->id }}" method="post">
                    @csrf
                    @method("delete")
                    <button class="btn badge bg-danger p-2" onclick="return confirm('anda yakin??');">Delete</button>
                </form>
            </td>
            {{-- <td>@mdo</td> --}}
        </tr>
        @endforeach
    </tbody>
</table>