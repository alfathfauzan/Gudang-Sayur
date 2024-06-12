@auth
    @if(Auth::user()->status == '0')
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>CRUD Product</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        </head>
        <body>
            <div class="container py-5">
                <div class="d-flex align-items-center justify-content-between">
                  <a href="admin"><button type="button" class="btn btn-primary">Go back to Admin Page</h1></button></a>
                    <h1 class="mb-0">List Product</h1>
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Add Product</a>
                </div>
                <hr />
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Product Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($products->count() > 0)
                            @foreach($products as $product)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $product->product_name }}</td>
                                    <td class="align-middle">{{ $product->price }}</td>
                                    <td class="align-middle"><img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" style="max-width: 100px; max-height: 100px;"></td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('product.show', ['id' => $product->id]) }}" type="button" class="btn btn-secondary">Detail</a>
                                            <a href="{{ route('product.edit', ['id' => $product->id]) }}" type="button" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else 
                            <tr>
                                <td class="text-center" colspan="5">Product not found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        </body>
        
        </html>
    @elseif(Auth::user()->status == '1')
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/css/produk.css">
            <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;700&family=Lobster&display=swap" rel="stylesheet" />
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet" />
            <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <title>Produk Kita</title>
        </head>
        <body>
            @include('partials.navbar')
            <section class="shop container">
                <h2 class="section-title">Shop Products</h2>
                <div class="shop-content">
                    @foreach($products as $product)
                        <div class="product-box">
                            <form action="{{ route('cart.add') }}" method="post">
                              @csrf
                                <img src="{{ $product->product_image }}" alt="" class="product-img">
                                <h2 class="product-title">{{ $product->product_name }}</h2>
                                <span class="price">${{ $product->price }}</span>
                                <button type="submit" name="add"><i class='bx bx-shopping-bag add-cart'></i></button>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>
            <script>
                document.getElementById('cart-icon').addEventListener('click', function() {
                    window.location.href = 'cart';
                });
            </script>
            <script src="{{ asset('js/app.js') }}"></script>
        </body>
        </html>
    @endif
@else
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/produk.css">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;700&family=Lobster&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Produk Kita</title>
</head>
<body>
    @include('partials.navbar')
    <section class="shop container">
        <h2 class="section-title">Shop Products</h2>
        <div class="shop-content">
            @foreach($products as $product)
                <div class="product-box">
                    <form action="{{ route('login') }}" method="post">
                      @csrf
                        <img src="{{ $product->product_image }}" alt="" class="product-img">
                        <h2 class="product-title">{{ $product->product_name }}</h2>
                        <span class="price">${{ $product->price }}</span>
                        <button type="submit" name="add"><i class='bx bx-shopping-bag add-cart'></i></button>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    </form>
                </div>
            @endforeach
        </div>
    </section>
    <script>
        document.getElementById('cart-icon').addEventListener('click', function() {
            window.location.href = 'cart.index';
        });
    </script>
    
</body>
</html>
@endauth