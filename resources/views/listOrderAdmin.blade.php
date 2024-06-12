<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container py-5">
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="mb-0">User Order</h1>
            <a href="/admin"><button type="button" class="btn btn-success">Go back to Admin Page</button></a>
        </div>
        <hr />
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-hover">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>Nama User</th>
                    <th>Address</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $order->alamat->nama_penerima }}</td>
                        <td class="align-middle">{{ $order->alamat->nama_alamat }}</td>
                        <td class="align-middle">${{ $order->total_price }}</td>
                        <td class="align-middle">
                            <form action="{{ route('admin.orders.changeStatus', ['order_id' => $order->id]) }}" method="POST">
                                @csrf
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="Belum Dibayar" {{ $order->status == 'Belum Dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                                    <option value="sedang dikirim" {{ $order->status == 'sedang dikirim' ? 'selected' : '' }}>Sedang Dikirim</option>
                                    <option value="Pesanan Selesai" {{ $order->status == 'Pesanan Selesai' ? 'selected' : '' }}>Pesanan Selesai</option>
                                </select>
                            </form>
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Details</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
</body>
</html>
