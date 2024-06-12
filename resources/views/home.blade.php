<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;700&family=Lobster&display=swap" rel="stylesheet"/>
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
    <title>Home</title>
</head>
<body>
  @include('partials.navbar');
  <!-- Slider -->
    <section class="image-slider">
      <div class="captions">
        <h1>
          Warning: These veggies <br />may cause extreme <br />deliciousness.
        </h1>
        <p class="konten">
          A pearl of health hidden in a fruit. A jewel of health,<br />
          hidden in a vegetable. Eat fruit to be cute
        </p>
        <div class="button">
          <a href="products"><button type="button" class="btn-1">Products</button></a>
          <a href="about"><button type="button" class="btn-2">About us</button></a>
        </div>
      </div>
      <div class="myslider" style="overflow: hidden">
        <img src="/img/slider1.png" width="100%" />
        <img src="/img/slider2.png" width="100%" />
        <img src="/img/slider3.png" width="100%" />
      </div>
    </section>

    <!-- Slider -->

    <!-- About us -->

    <div class="main-content" id="about-us">
      <div class="column">
        <div class="col1">
          <img src="/img/5e30e9bc69af5.jpg" alt="" class="" data-wow-delay=".3s" />
        </div>
        <div class="col1 about" data-wow-delay=".3s">
          <h1>Kesegaran Hasil Produksi Tani Indonesia</h1>
          <p>
            Kami adalah sebuah platform inovatif yang menghadirkan solusi modern
            untuk memenuhi kebutuhan Anda akan sayuran segar, langsung dari
            kebun ke meja Anda. Berawal dari keinginan untuk menghadirkan
            kemudahan dan kenyamanan dalam mendapatkan sayuran berkualitas
            tinggi, kami membangun Gudang Sayur sebagai jawaban atas tantangan
            gaya hidup yang sibuk dan tuntutan akan makanan yang sehat.
          </p>
          <p>
            Di Gudang Sayur, kami memahami bahwa memilih dan mendapatkan sayuran
            yang segar dan berkualitas bisa menjadi tugas yang menantang,
            terutama di tengah kehidupan yang sibuk. Oleh karena itu, kami telah
            merancang platform online kami untuk memberikan akses yang mudah dan
            cepat ke berbagai pilihan sayuran segar, dengan hanya beberapa klik
            dari gadget Anda.
          </p>
          <p>
            Kualitas adalah landasan dari setiap layanan yang kami sediakan.
            Kami bekerja sama dengan para petani terpercaya yang berkomitmen
            pada praktik pertanian organik dan bertanggung jawab untuk
            memastikan bahwa setiap produk yang kami tawarkan memenuhi standar
            kualitas tertinggi. Dari sayuran hijau segar hingga eksotis, kami
            menawarkan beragam pilihan yang akan memenuhi kebutuhan nutrisi Anda
            sehari-hari.
          </p>
        </div>
      </div>
    </div>

    <!-- About us -->
    <!-- Features -->

    <section
      class="features"
      style="background-image: url(/img/bg-icon.png);"
      id="fitur"
    >
      <div class="h-container">
        <div class="header">
          <h1>Fitur Kami</h1>
          <p>
            Beberapa fitur penawaran kami kepada anda untuk pengalaman
            berbelanja yang menyenangkan:
          </p>
        </div>
      </div>
      <div class="container">
        <div class="container-inner">
          <div class="box">
            <div class="b-content">
              <img src="/img/icon-1.png" alt="" />
              <p>Menggunakan bibit unggul</p>
            </div>
          </div>

          <div class="box">
            <div class="b-content">
              <img src="/img/icon-2.png" alt="" />
              <p>Ditanam dengan pupuk alami</p>
            </div>
          </div>

          <div class="box">
            <div class="b-content">
              <img src="/img/icon-3.png" alt="" />
              <p>Bebas Zat Kimia</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features -->
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


    

    
    <!-- script -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
      integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
      integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
      integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
      integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="/js/script1.js"></script>
    <script src="/js/script.js"></script>

    <script type="text/javascript">
      $(".myslider").slick({
        infinite: true,
        speed: 1000,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        adaptiveHeight: false,
        fade: true,
        cssEase: "linear",
      });

      

      new WOW().init();
    </script>
    <script>
      document.getElementById('cart-icon').addEventListener('click', function() {
          window.location.href = 'cart';
      });
  </script>
</body>
</html>