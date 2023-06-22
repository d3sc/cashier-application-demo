<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        .container {
            width: 300px;
        }

        .header {
            margin: 0;
            text-align: center;
        }

        h2,
        p {
            margin: 0;
        }

        .flex-container-1 {
            display: flex;
            margin-top: 10px;
        }

        .flex-container-1>div {
            text-align: left;
        }

        .flex-container-1 .right {
            text-align: right;
            width: 200px;
        }

        .flex-container-1 .left {
            width: 100px;
        }

        .flex-container {
            width: 300px;
            display: flex;
        }

        .flex-container>div {
            -ms-flex: 1;
            /* IE 10 */
            flex: 1;
        }

        ul {
            display: contents;
        }

        ul li {
            display: block;
        }

        hr {
            border-style: dashed;
        }

        a {
            text-decoration: none;
            text-align: center;
            padding: 10px;
            background: #00e676;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header" style="margin-bottom: 30px;">
            <h2>Toko Letris Mart</h2>
            <small>KETAPANG BUSINESS CENTER BLOK D2-D3 NO. 20, Jl. Kyai Haji Zainul Arifin, RT.8/RW.7, Krukut, Kec.
                Taman Sari, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11140
            </small>
        </div>
        <hr>
        <div class="flex-container-1">
            <div class="left">
                <ul>
                    <li>No Order</li>
                    <li>Kasir</li>
                    <li>Tanggal</li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li>{{ $order->no_order }}</li>
                    <li>{{ $order->nama_kasir }}</li>
                    <li>{{ $order->created_at }}</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="flex-container" style="margin-bottom: 10px; text-align:right;">
            <div style="text-align: left;">Nama Product</div>
            <div>Harga/Qty</div>
            <div>Total</div>
        </div>
        @foreach ($order->orderProduct as $item)
        <div class="flex-container" style="text-align: right; gap: 15px; margin-bottom: 1rem; padding: 0.5rem;">
            <div class="item"><span style="font-weight:bold">{{ $item->quantity }}x</span> {{
                $item->product->nama_product }}</div>
            <div class="item">Rp.{{ number_format((int)$item->product->harga_product) }}</div>
            <div class="item">Rp.{{ number_format((int)$item->total_harga) }}</div>
        </div>
        @endforeach
        <hr>
        <div class="flex-container" style="text-align: right; margin-top: 10px;">
            <div></div>
            <div>
                <ul>
                    <li>Grand Total</li>
                    <li>Pembayaran</li>
                    <li>Kembalian</li>
                </ul>
            </div>
            <div style="text-align: right;">
                <ul>
                    <li>Rp.{{ number_format($order->orderProduct[0]->grand_total) }}</li>
                    <li>Rp.{{ number_format($order->orderProduct[0]->pembayaran) }}</li>
                    <li>Rp.{{ number_format($order->orderProduct[0]->kembalian) }}</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="header" style="margin-top: 50px;">
            <h3>Terimakasih</h3>
            <p>Silahkan berkunjung kembali</p>
        </div>
    </div>
</body>
</html>