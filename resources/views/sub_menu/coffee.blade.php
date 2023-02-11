
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kaldi.id | {{ $title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/faviconkaldi.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">


    </style>
    <link rel="stylesheet" href="assets/slider_vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/slider_vendor/owl.theme.default.min.css">
    <script src="assets/slider_vendor/jquery.min.js"></script>
    <script src="assets/slider_vendor/owl.carousel.js"></script>

</head>

<body>
    <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
          <a href="/" class="logo me-auto me-lg-0"><img src="assets/img/logokaldiwhite.png" alt="" class="img-fluid"></a>
          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <li><a class="nav-link scrollto active" href="/">Home</a></li>
              <li><a class="nav-link scrollto" href="/">About</a></li>
              <li><a class="nav-link scrollto" href="/">Menu</a></li>
              <li><a class="nav-link scrollto" href="/">Gallery</a></li>
              <li><a class="nav-link scrollto" href="/">Location</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
              </nav><!-- .navbar -->
              <div class="dropdown">
                  <!-- 2 Bahasa-->
                  <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <p>Change Language</p>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-child">
                      <button onclick="gantiBahasa()" class="dropdown-item">
                          <p>indonesia</p>
                      </button>
                      <button onclick="gantiBahasa()" class="dropdown-item">
                          <p>english</p>
                      </button>

                  </div>
              </div>

            </div>
          </div>
  </header><!-- End Header -->
    <!-- body -->

    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>coffee</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>
            <div class="home-demo">
                <div class="row">
                    <div class="owl-carousel owl-theme">
                        @foreach ($coffee as $row) 
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="item">
                                <div class="icon-box" role="button" aria-pressed="true">
                            <img src="{{ $row->image }}" style="width: 200px; margin-bottom: 10px;" alt="">
                        <h4>{{ $row->title }}</h4>
                    <p>{{ $row->description }}</p>
                </div>
            </div>
            </div>
            @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script>
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                margin: 10,
                loop: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        </script>
    </section><!-- End Services Section -->
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3>Kaldi.id</h3>
            <p>Just Brew It!</p>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/kaldi.id/" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>

        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>
</body>

</html>