<div>
    <form wire:submit.prevent='store'>
        <div class="row">
            <div class="col-md-8">
                <label for="" class="form-label">Nama Barang</label>
                <select class="form-select" wire:model='product' name="product">
                    @foreach ($data as $item)
                    {{-- @if ($edit_product->product_id == $item->id)
                    <option value="{{ $item->id }}" selected="true">{{ $item->nama_product }}</option>
                    @else --}}
                    <option value="{{ $item->id }}">{{ $item->nama_product }}</option>
                    {{-- @endif --}}
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="" class="form-label">Harga</label>
                <input type="text" class="form-control" placeholder="Harga" disabled
                    value="Rp.{{ number_format((int)$harga_product) }}">
            </div>

        </div>
        <div class="row mt-4">
            <div class="col-sm-2">
                <label for="" class="form-label">Quantity</label>
                <input type="text" class="form-control" placeholder="quantity" wire:model='quantity_product'>
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label">Total Harga</label>
                <input type="text" class="form-control" placeholder="Total Harga" disabled readonly value=""
                    wire:model='total_harga'>
            </div>
        </div>
        <div class="row">
            <div class="col mt-4">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>