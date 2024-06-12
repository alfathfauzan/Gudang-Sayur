<!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>My Order</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        </head>
        <body>
            <div class="container py-5">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="mb-0">My Order</h1>
                    <a href="/"><button type="button" class="btn btn-success">Go back to Home Page</h1></button></a>
                   
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
                            <th>Nama Penerima</th>
                            <th>Address</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        
                                <tr>
                                    <td class="align-middle">1</td>
                                    <td class="align-middle">{{ $order->alamat->nama_penerima }}</td>
                                    <td class="align-middle">{{ $order->alamat->nama_alamat }}</td>
                                    <td class="align-middle">${{ $order->total_price }}</td>
                                    <td class="align-middle">{{ $order->status }}</td>
                                    @if($order->status == 'Belum Dibayar')
                                    <td><form action="{{ route('stripe.session', ['order_id' => $order->id]) }}" method="POST">
                                        @csrf
                                    <button type="submit" class="btn btn-primary">Pay Now</button>
                                    </form></td>
                                    @elseif($order->status == 'sedang dikirim')
                                    <td>
                                    
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Konfirmasi Pesanan
                                      </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            Apakah anda yakin ingin mengkonfirmasi pesanan ?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('order.confirm', ['order_id' => $order->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Konfirmasi Pesanan</button>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </td>
                                    @endif
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