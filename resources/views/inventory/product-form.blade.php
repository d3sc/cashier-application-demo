<div class="row">
    @if (session()->has('success-create'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success-create') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="/inventori" method="post">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nama Product</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan nama barang"
                name="nama_product">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Harga Product</label>
            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Masukan harga barang"
                name="harga_product">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>