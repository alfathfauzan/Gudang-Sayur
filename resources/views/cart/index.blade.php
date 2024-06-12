<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Cart</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <style>
        .btn-custom {
            background-color: rgb(168, 189, 172);
            border-color: rgb(168, 189, 172);
            
        }
        .btn-custom:hover {
            background-color: rgb(158, 179, 156); /* Tambahkan efek hover jika diinginkan */
            border-color: rgb(158, 179, 156);
        }

        .addresses {
    flex: 1 1 45%; /* Mengatur lebar maksimal 45% agar dua elemen bisa sejajar dengan jarak */
    box-sizing: border-box; /* Memastikan padding dihitung dalam ukuran elemen */
    margin-bottom: 10px; /* Memberikan jarak bawah */
}

h3 {
    margin-bottom: 10px; /* Mengurangi margin bawah */
    font-size: 1.2em; /* Mengurangi ukuran font */
}

.delivery-address {
    display: flex;
    flex-wrap: wrap;
    gap: 10px; /* Mengatur jarak antar elemen */
}

.address-card {
    border: 1px solid #ddd;
    padding: 10px; /* Mengurangi padding */
    border-radius: 5px; /* Membuat tepi melengkung */
    margin-bottom: 10px; /* Memberikan jarak bawah */
    width: 100%;
}

.address-card.default {
    border-color: rgb(168, 189, 166);
}

.address-card h5 {
    margin: 0 0 5px; /* Mengurangi margin */
    font-size: 1em; /* Mengurangi ukuran font */
}

.address-card p {
    margin: 2px 0; /* Mengurangi margin */
    font-size: 0.9em; /* Mengurangi ukuran font */
}

.default-badge {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    padding: 3px 5px;
    font-size: 0.8em;
    border-radius: 3px;
}

.btn {
    background-color: rgb(168, 189, 166);
    color: #fff;
    padding: 8px 16px; /* Mengurangi padding */
    border: none;
    cursor: pointer;
    display: inline-block;
    margin-top: 10px;
    text-align: center;
    border-radius: 5px; /* Membuat tepi melengkung */
}

.add-address {
    background-color: rgb(168, 189, 166);
}

    </style>
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body>
    <section class="h-100 gradient-custom">
      <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
          <div class="col-md-8">
            <div class="card mb-4">
              <div class="card-header py-3">
                <a href="{{ route('products') }}" ><button type="button" class="btn add-address ">Go back to products</button></a>
                <h5 class="mb-0">Your Cart</h5>
                
              </div>
              <div class="card-body">
                @foreach($cartItems as $item)
                <!-- Single item -->
                <div class="row">
                  <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                    <!-- Image -->
                    <div
                      class="bg-image hover-overlay hover-zoom ripple rounded"
                      data-mdb-ripple-color="light"
                    >
                      <img
                        src="{{ asset($item->product->product_image) }}"
                        class="w-100"
                        alt="{{ $item->product->product_name }}"
                      />
                      <a href="#!">
                        <div
                          class="mask"
                          style="background-color: rgba(251, 251, 251, 0.2)"
                        ></div>
                      </a>
                    </div>
                    <!-- Image -->
                  </div>

                  <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                    <!-- Data -->
                    <p><strong>{{ $item->product->product_name }}</strong></p>
                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    @csrf
                    @method('DELETE')
                    <button
                      type="submit"
                      
                      class="btn btn-custom btn-sm me-1 mb-2"
                      
                      title="Remove item"
                    >
                    <i class="fas fa-trash"></i>
                    </button>
                    </form>
                    
                    
                    <!-- Data -->
                  </div>

                  <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <!-- Quantity -->
                    <div class="d-flex mb-4" style="max-width: 300px">
                      <button
                        data-mdb-button-init
                        data-mdb-ripple-init
                        class="btn btn-custom px-3 me-2"
                        onclick="updateQuantity(this, 'decrease')"
                      >
                        <i class="fas fa-minus"></i>
                      </button>

                      <div data-mdb-input-init class="form-outline">
                        <form action="{{ route('cart.updateQuantity', $item->id) }}" method="POST">
                            @csrf
                            <input
                          id="form1"
                          min="1"
                          name="jumlah"
                          value="{{ $item->jumlah }}"
                          type="number"
                          class="form-control"
                          onchange="submitForm(this)"
                        />
                        
                        
                        </form>
                        
                      </div>

                      <button
                        data-mdb-button-init
                        data-mdb-ripple-init
                        class="btn btn-custom px-3 ms-2"
                        onclick="updateQuantity(this, 'increase')"
                      >
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                    <!-- Quantity -->

                    <!-- Price -->
                    <p class="text-start text-md-center">
                      <strong>${{ $item->jumlah * $item->product->price }}</strong>
                    </p>
                    <!-- Price -->
                  </div>
                </div>
                <!-- Single item -->

                <hr class="my-4" />

                @endforeach
                <!-- Single item -->
              </div>
            </div>
            <div class="card mb-4">
              <div class="card-body">
                <h3>Delivery Address</h3>
                <form action="{{ route('orders.store') }}" method="POST">
                  @csrf
                <section class="delivery-address">
                  @foreach ($alamats as $alamat)
                  <div class="addresses">
                      <div class="address-card default">
                        <input type="radio" name="alamat_id" value="{{ $alamat->id }}" required>
                        <h3>{{ $alamat->nama_penerima }}</h3>
                        <p>{{ $alamat->nama_alamat }}</p>
                        <p>{{ $alamat->city }}</p>
                        <p>{{ $alamat->state }}</p>
                        <p>{{ $alamat->zip_code }}</p>
                        <p>{{ $alamat->description }}</p>
                          
                      </div>
                  </div>
                  @endforeach
                  <a href="/alamat"><button class="btn add-address">Add a New Address</button></a>
              </section>
              </div>
            </div>
            <div class="card mb-4">
              <div class="card-body">
                <p><strong>Expected shipping delivery</strong></p>
                <p class="mb-0">12.10.2020 - 14.10.2020</p>
              </div>
            </div>

            
            <div class="card mb-4 mb-lg-0">
              <div class="card-body">
                <p><strong>We accept</strong></p>
                <img
                  class="me-2"
                  width="45px"
                  src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                  alt="Visa"
                />
                <img
                  class="me-2"
                  width="45px"
                  src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                  alt="American Express"
                />
                <img
                  class="me-2"
                  width="45px"
                  src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                  alt="Mastercard"
                />
                
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-header py-3">
                <h5 class="mb-0">Summary</h5>
              </div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0"
                  >
                    Products
                    <span>${{ $totalPrice }}</span>
                  </li>
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center px-0"
                  >
                    Shipping
                    <span>Gratis</span>
                  </li>
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3"
                  >
                    <div>
                      <strong>Total amount</strong>
                      <strong>
                        <p class="mb-0">(including VAT)</p>
                      </strong>
                    </div>
                    <span><strong>${{ $totalPrice }}</strong></span>
                  </li>
                </ul>
                
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button
                  type="submit"
                  
                  class="btn  add-address btn-lg btn-block"
                  id="checkout-live-button"
                >
                  Make Order
                </button>
            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <script>
        function submitForm(input) {
            input.closest('form').submit();
        }

        function updateQuantity(button, action) {
            const input = button.parentNode.querySelector('input[type=number]');
            if (action === 'increase') {
                input.stepUp();
            } else {
                input.stepDown();
            }
            submitForm(input);
        }
    </script>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.umd.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
