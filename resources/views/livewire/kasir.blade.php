<div>
    <form wire:submit.prevent='store'>
        <div class="row">
            <div class="col-md-8">
                <select class="form-select" wire:model='product' name="product">
                    @foreach ($data as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_product }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Harga" disabled
                    value="Rp.{{ number_format((int)$harga_product) }}">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>