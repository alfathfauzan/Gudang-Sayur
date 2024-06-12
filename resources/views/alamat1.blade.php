<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/alamat.css">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;700&family=Lobster&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Address</title>
</head>
<body>
    @include('partials.navbar')

    <section class="address container">
        <div class="address-book">
            <h1>Your Address</h1>
            <button type="button" class="btn btn-primary btn-lg">Large button</button>

                
            <button class="add-address">Add a New Address</button>
            <button type="button" class="add-address" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add a New Address
              </button>

             {{--Modal  --}}
              
             <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Address</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                            <form action="/alamat" method="POST">
                                @csrf
                            <div class="modal-body">
                               <div class="mb-3">
                                <label for="nama_penerima" class="form-label">Nama Penerima</label>
                                <input type="text" class="form-control" id="nama_penerima" aria-describedby="emailHelp" name="nama_penerima">
                              </div>
                              <div class="mb-3">
                                <label for="nama_alamat" class="form-label">Nama Alamat</label>
                                <input type="text" class="form-control" id="nama_alamat" name="nama_alamat">
                              </div>
                              <div class="mb-3">
                                <label for="city" class="form-label">Kota</label>
                                <input type="text" class="form-control" id="city" name="city">
                              </div>
                              <div class="mb-3">
                                <label for="state" class="form-label">Provinsi</label>
                                <input type="text" class="form-control" id="state" name="state">
                              </div>
                              <div class="mb-3">
                                <label for="zip_code" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code">
                              </div>

                              <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="description" name="description">
                              </div>
                              
                              
                        
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                    </div>
                  </div>
                </div>
              </div>

            @if ($alamats->isEmpty())
                <p>Pengguna ini belum memiliki alamat.</p>
            @else

            @foreach ($alamats as $alamat)
            <div class="address-card">
             <h2>{{ $alamat->nama_penerima }}</h2>
            <p>{{ $alamat->nama_alamat }}</p>
            <p>{{ $alamat->city }}</p>
            <p>{{ $alamat->state }}</p>
            <p>{{ $alamat->zip_code }}</p>
            <p>{{ $alamat->description }}</p>
            <div class="actions">
                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="edit">Edit</button>
                
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Address</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('alamatupdate', $alamat->id) }}" method="POST">
                        <div class="modal-body">
                                @csrf
                                @method('PUT')
                                <label for="nama_penerima">Nama Penerima:</label><br>
                                <input type="text" id="nama_penerima" name="nama_penerima"><br>
                                
                                <label for="nama_alamat">Nama Alamat:</label><br>
                                <input type="text" id="nama_alamat" name="nama_alamat"><br>
                        
                                <label for="city">Kota:</label><br>
                                <input type="text" id="city" name="city"><br>
                        
                                <label for="state">Provinsi:</label><br>
                                <input type="text" id="state" name="state"><br>
                        
                                <label for="zip_code">Kode Pos:</label><br>
                                <input type="text" id="zip_code" name="zip_code"><br>
                        
                                <label for="description">Deskripsi:</label><br>
                                <textarea id="description" name="description"></textarea><br>
                        
                                
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>


                <form action="{{ route('alamatdestroy', $alamat->id) }}" method="POST" type="button"  onsubmit="return confirm('Delete?')">
                    @csrf
                    @method('DELETE')
                    <button class="delete">Delete</button>                  
                </form>
            </div>
            </div>
             
            @endforeach
            @endif
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script >
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
    })
    </script>

    
</body>
</html>