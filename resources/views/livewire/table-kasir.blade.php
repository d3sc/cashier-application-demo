<div>
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('fail') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">nama product</th>
                <th scope="col">quantity</th>
                <th scope="col">harga product</th>
                <th scope="col">total harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->product->nama_product }}</td>
                <td>
                    @if ($item->quantity > 1)
                    <button class="btn badge bg-danger px-2"
                        wire:click='quantityDecrement({{ $item->id }}, {{ $item->product->id }})'>-</button>
                    @endif
                    <input type="text" class="w-25" value="{{ $item->quantity }}" readonly disabled>
                    <button class="btn badge bg-success px-2"
                        wire:click='quantityIncrement({{ $item->id }}, {{ $item->product->id }})'>+</button>
                </td>
                <td>Rp.{{ number_format($item->product->harga_product) }}</td>
                <td>Rp.{{ number_format($item->total_harga) }}</td>
                <td class="p-2">
                    <a href="/transaksi/{{ $item->id }}" class="btn badge bg-warning w-full d-inline">Detail</a>
                    <form action="/transaksi/{{ $item->id }}" method="post">
                        @method("delete")
                        @csrf
                        <button type="submit" class="btn badge bg-danger p-2;"
                            onclick="return confirm('are you sure?!')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr>
                <td style="text-align: right">
                    <label for="">Total Pembelian</label>
                </td>
                <td>
                    <span><strong>Rp.{{ number_format($data->sum("total_harga")) }}</strong></span>
                </td>
            </tr>
            <tr>
                <td style="text-align: right"><label for="">Pembayaran</label></td>
                <td><input type="number" wire:model='pembayaran'></td>
                <td class="d-flex justify-center items-center gap-3">
                    <input type="button" class="btn-check" id="btncheck1" autocomplete="off"
                        wire:click='tambahan(5000)'>
                    <label class="btn btn-outline-primary" for="btncheck1">Rp.5,000</label>
                    <input type="button" class="btn-check" id="btncheck2" autocomplete="off"
                        wire:click='tambahan(10000)'>
                    <label class="btn btn-outline-primary" for="btncheck2">Rp.10,000</label>
                </td>
                <td>
                    <input type="button" class="btn-check" id="btncheck3" autocomplete="off"
                        wire:click='tambahan(20000)'>
                    <label class="btn btn-outline-primary" for="btncheck3">Rp.20,000</label>
                </td>
                <td>
                    <input type="button" class="btn-check" id="btncheck4" autocomplete="off"
                        wire:click='tambahan(50000)'>
                    <label class="btn btn-outline-primary" for="btncheck4">Rp.50,000</label>
                </td>
                {{-- <td>
                    <input type="button" class="btn-check" id="btncheck5" autocomplete="off"
                        wire:click='tambahan(100000)'>
                    <label class="btn btn-outline-primary" for="btncheck5">Rp.100,000</label>
                </td> --}}
            </tr>
            <tr>
                <td style="text-align: right"><label for="">Kembalian</label></td>
                <td><input type="text" readonly disabled
                        value="{{ number_format((int)$pembayaran - $data->sum('total_harga')) }}"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="button" wire:click='submit' class="btn btn-success">Bayar</button>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <form action="/transaksi/delete/all" method="post">
                        @method("delete")
                        @csrf
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure delete all records?!')">del all</button>
                    </form>
                </td>
            </tr>
        </tfoot>
    </table>
</div>