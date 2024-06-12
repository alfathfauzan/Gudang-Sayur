<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="iE=Edge">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;700&family=Lobster&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>About Us</title>
</head>
<body>
    @include('partials.navbar');
    <section class="about1">
        <h1 align-ite   ms="center">
            About Us
        </h1>
        <div class="main">
            
            <div class="card">
                <img src="img/1.jpg" alt="#" style="margin-right: -400px;">
            </div>
            <div class="about-text">
                <h4>Muhammad Fauzan Alfath</h4>
                <h5>187221093</h5>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <span>when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book.</span>
                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                    essentially unchanged.
                    It was <span>popularised in the 1960s with the release of Letraset sheets</span> containing Lorem
                    Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including
                    versions of Lorem Ipsum.
                </p>
                <a>
                    <ion-icon name="logo-whatsapp"></ion-icon>
                    <ion-icon name="logo-instagram"></ion-icon>
                    <ion-icon name="logo-github"></ion-icon>
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
            </div>
        </div>
        <div class="main">
            <div class="about-text">
                <h4>Naufaldo Rafi Brahmana</h4>
                <h5>18722100</h5>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    <span>Lorem Ipsum has been the industry's standard</span> dummy text ever since the 1500s, when an
                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, <span>but also the leap into electronic typesetting,
                        remaining essentially unchanged. </span>
                    It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                    Ipsum.
                </p>
                <a>
                    <ion-icon name="logo-whatsapp"></ion-icon>
                    <ion-icon name="logo-instagram"></ion-icon>
                    <ion-icon name="logo-github"></ion-icon>
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
            </div>
            <div class="card">
                <img src="img/2.jpg" alt="#" style="margin-left: -400px;">
            </div>
        </div>
    </section>


    <section class="footer wow animate__animated animate__fadeIn" data-wow-delay=".2s" style="background-image: url(img/bg-icon.png);">
        <div class="container">
            <div class="container-inner">
                <div class="box">
                    <label for="" class="logo">Gudang Sayur</label>
                    <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.
                        Clita erat ipsum et lorem et sit, sed stet lorem sit clita</p>
                </div>
                <div class="box">
                    <h1>Address</h1>
                    <div class="address">
                        <i class="fa fa-location-arrow"></i> <a>Universitas Airlangga, Surabaya</a><br>
                        <i class="fa fa-phone"></i> <a>+62085801688001</a><br>
                        <i class="fa fa-envelope"></i> <a>ojanganteng@example.com</a>
                    </div>
                </div>
                <div class="box">
                    <h1>Quick Links</h1>
                    <div class="links">
                        <a href=""><i class="fa fa-chevron-right"></i> About Us</a>
                        <a href=""><i class="fa fa-chevron-right"></i> Contact Us</a>
                        <a href="products"><i class="fa fa-chevron-right"></i> Products</a>
                        <a href="blog"><i class="fa fa-chevron-right"></i> Blogs</a>
                        <a href=""><i class="fa fa-chevron-right"></i> Support</a>
                    </div>
                </div>
                <div class="box">
                    <h1>Follow Us</h1>
                    <div class="follow">
                        <i class="fa fa-brands fa-twitter"></i>
                        <i class="fa fa-brands fa-facebook"></i>
                        <i class="fa fa-brands fa-whatsapp"></i>
                        <i class="fa fa-brands fa-linkedin"></i><br>
                        <a href="register"><button type="submit" class="signup"><i class="fa fa-chevron-right"></i>SignUp</button></a>
                    </div>
                </div>
            </div>
        </div>
  
        <div class="copyright">
            <a href="#" class="sitename">
                <i class="fa fa-copyright"></i>
                Gudang Sayur, <span>All Rights Reserved.</span>
            </a>
        </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    
</body>
</html>