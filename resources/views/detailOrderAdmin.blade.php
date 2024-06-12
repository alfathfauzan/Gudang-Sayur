<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="/css/orderAdmin.css">
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>ID Pesanan : {{ $order->id }}</h1>
            <a href="#" class="print-button">Cetak Nota</a>
        </div>
        <div class="invoice-content">
            <div class="transaction-data">
                <h2>Data Transaksi</h2>
                <p><strong>ID Pesanan:</strong> {{ $order->id }}</p>
                <p><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y') }}</p>
                <p><strong>Nama Pelanggan:</strong> {{ $order->user->name }}</p>
                <p><strong>Status Pesanan:</strong> {{ $order->status }}</p>
                <a href="/admin/orders"><button class="back-button">Kembali</button></a>
            </div>
            <div class="transaction-values">
                <h2>Nilai Transaksi</h2>
                <p><strong>Total:</strong> ${{ number_format($order->total_price, 2) }}</p>
            </div>
            <div class="shopping-list">
                <h2>Daftar Belanja</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->product->product_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>