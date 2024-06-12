@auth
    @if(Auth::user()->status == '0')
    <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Library</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <style>
              .text-truncate {
                  white-space: nowrap;
                  overflow: hidden;
                  text-overflow: ellipsis;
                  max-width: 150px; /* Adjust the width as needed */
              }
          </style>
          </head>
        
        <body>
            <div class="container py-5">
                <div class="d-flex align-items-center justify-content-between">
                  <a href="admin"><button type="button" class="btn btn-primary">Go back to Admin Page</h1></button></a>
                    <h1 class="mb-0">List Blog</h1>
                    <a href="{{ route('blog.create') }}" class="btn btn-primary">Add Blog</a>
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
                            <th>Blog Name</th>
                            <th>Blog Image</th>
                            <th>slug</th>
                            <th>Author</th>
                            <th>Isi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($blogs->count() > 0)
                            @foreach($blogs as $blog)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $blog->judul_blog }}</td>
                                    <td class="align-middle text-truncate ">{{ $blog->blog_image }}</td>
                                    <td class="align-middle">{{ $blog->slug }}</td>
                                    <td class="align-middle">{{ $blog->author }}</td>
                                    <td class="align-middle">{{ $blog->isi }}</td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('blog.show', ['id' => $blog->id]) }}" type="button" class="btn btn-secondary">Detail</a>
                                            <a href="{{ route('blog.edit', ['id' => $blog->id]) }}" type="button" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
                                <td class="text-center" colspan="5">Blog not found</td>
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
    <link rel="stylesheet" href="/css/blog1.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;700&family=Lobster&display=swap"
      rel="stylesheet"
    />
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
      integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"
      integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Document</title>
</head>
<body>
  <div class="nav">

    <nav class="nav">
       <input type="checkbox" id="check" />
       <label for="check" class="checkbtn">
         <i class="fa fa-bars"></i>
       </label>
  
       <label for="" class="logo">Gudang Sayur</label>
  
       <ul>
         <li><a href="/">Home</a></li>
         <li><a href="/about">About</a></li>
         <li><a href="#services">Services</a></li>
         <li><a href="products">Products</a></li>
         <li><a href="blog">Blog</a></li>
         <li class="right-links">
  
          @if (Auth::check())                  
          <li>
            <a href="#">Welcome back,{{ (auth()->user()->name) }} ▾</a>
            <ul class="dropdown">
              <li>
                <form action="/update" >
                  @csrf
                  <button class="btn" type="submit">Edit Profile</button>      
                </form>
              </li>
              <li>                    
                  <button class="btn" type="submit"><a href="/alamat" style="background-color: transparent;color:white">Address</a></button>                           
              </li>
              <li>                    
                <button class="btn" type="submit"><a href="/orders" style="background-color: transparent;color:white">My Order</a></button>                           
            </li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button class="btn" type="submit">Logout</button>      
                  </form>
                </li>
                
            </ul>
            
        </li>
                  <li class="carts">
                    <i class='bx bx-shopping-bag carts' id= "cart-icon" ></i>Cart
                    <span id="cart_count" class="text-warning bg-light">
                      {{ isset($cartItemsCount) ? $cartItemsCount : 0 }}
                    </span>
                  </li>
                  
              @else
              <a href="login"> <button class="btns">Login</button> </a>
              @endif
         
  
           
           
         </ul>
  
       </nav>
  
       
   </div>

   <section class="blog">
     <h1 class="heading">Our Blog</h1>
     @foreach ($blogs as $blog)

      <div class="box-container">
        <div class="box shadow">
          <div class="image">
            <img src="{{ $blog->blog_image }}" alt="" />
            
          </div>
          <div class="content">
            <h3>{{ $blog->judul_blog}}
            </h3>
            <p>
            {{ $blog->isi }}
            </p>
            <a href="/blog/{{ $blog->slug }}>" class="btn">read more</a>
          </div>
          
        </div>
        
        

        

        

        

        
      </div>
    </section>
@endforeach

<script>
  document.getElementById('cart-icon').addEventListener('click', function() {
      window.location.href = 'cart';
  });
</script>
</body>
</html>
@endif
@else
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/blog1.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;700&family=Lobster&display=swap"
      rel="stylesheet"
    />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
      integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"
      integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Document</title>
</head>
<body>
  <div class="nav">

    <nav class="nav">
       <input type="checkbox" id="check" />
       <label for="check" class="checkbtn">
         <i class="fa fa-bars"></i>
       </label>
  
       <label for="" class="logo">Gudang Sayur</label>
  
       <ul>
         <li><a href="/">Home</a></li>
         <li><a href="/about">About</a></li>
         <li><a href="#services">Services</a></li>
         <li><a href="products">Products</a></li>
         <li><a href="blog">Blog</a></li>
         <li class="right-links">
  
          @if (Auth::check())                  
          <li>
            <a href="#">Welcome back,{{ (auth()->user()->name) }} ▾</a>
            <ul class="dropdown">
              <li>
                <form action="/update" >
                  @csrf
                  <button class="btn" type="submit">Edit Profile</button>      
                </form>
              </li>
              <li>                    
                  <button class="btn" type="submit"><a href="/alamat" style="background-color: transparent;color:white">Address</a></button>                           
              </li>
              <li>                    
                <button class="btn" type="submit"><a href="/orders" style="background-color: transparent;color:white">My Order</a></button>                           
            </li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button class="btn" type="submit">Logout</button>      
                  </form>
                </li>
                
            </ul>
            
        </li>
                  <li class="carts">
                    <i class='bx bx-shopping-bag carts' id= "cart-icon" ></i>Cart
                    <span id="cart_count" class="text-warning bg-light">
                      {{ isset($cartItemsCount) ? $cartItemsCount : 0 }}
                    </span>
                  </li>
                  
              @else
              <a href="login"> <button class="btns">Login</button> </a>
              @endif
         
  
           
           
         </ul>
  
       </nav>
  
       
   </div>

   <section class="blog">
     <h1 class="heading">Our Blog</h1>
     @foreach ($blogs as $blog)

      <div class="box-container">
        <div class="box shadow">
          <div class="image">
            <img src="{{ $blog->blog_image }}" alt="" />
            
          </div>
          <div class="content">
            <h3>{{ $blog->judul_blog}}
            </h3>
            <p>
              {{ Str::limit($blog->isi, 20) }}
            </p>
            <a href="/blog/{{ $blog->slug }}>" class="btn">read more</a>
          </div>
          
        </div>
        
        

        

        

        

        
        @endforeach
      </div>
    </section>

<script>
  document.getElementById('cart-icon').addEventListener('click', function() {
      window.location.href = 'cart';
  });

</script>
</body>
</html>

@endauth