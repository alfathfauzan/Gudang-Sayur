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

<header>
      <nav class="nav">
        <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">
          <i class="fa fa-bars"></i>
        </label>

        <label for="" class="logo">Gudang Sayur</label>

        <ul>
          <li><a href="/home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="/products">Products</a></li>
          <li><a href="/blog">blog</a></li>
          <li class="right-links">

         
          

            <a href="logout.php"> <button class="btns">Log Out</button> </a>
            
        </ul>
      </nav>
</header>

<div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-8">
        <h1 class="mb-3">{{ $blog->judul_blog }}</h1>

      
        
        <article class="my-3 fs-5">
          {!! $blog->body !!}
        </article>

        <a href="/blog" class="d-block mt-3">Back to blog</a>
      </div>
    </div>
  </div>
        
        

        

        


</body>
</html>


