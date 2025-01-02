<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>APP TRPL 2A</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">apptrpl2A@gmail.com</a></i>
          <i class="bi bi-person-circle align-items-center ms-4"><span>fathiyyah ermita sari</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <h1 class="sitename">APP TRPL 2A</h1>
        </a>

                <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="?p=home" class="active">Home</a></li>
            <li class="dropdown"><a href="#"><span>APP</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="?p=mhs">mahasiswa</a></li>
                <li><a href="?p=prodi">prodi </a></li>
                <li><a href="?p=dosen">dosen</a></li>
              </ul>
            </li>
            <li><a href="?p=kategori">kategori</a></li>
            
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>

 

  <div class="container">
    <?php
        $page=isset($_GET['p']) ? $_GET['p'] : 'home';

        if ($page=='home') include 'home.php';
        if ($page=='mhs') include 'mahasiswa.php';
        if ($page=='prodi') include 'prodi.php';
        if ($page=='dosen') include 'dosen.php';
        if ($page=='kategori') include 'kategori.php';
        if ($page=='berita') include 'berita.php';

    ?>
</div>

<footer id="footer" class="footer">
  <div class="container footer-top">
    <div class="row gy-4 d-flex justify-content-between align-items-center">
      <!-- Left Side: APP TRPL -->
      <div class="col-lg-4 col-md-6 footer-about">
        <a href="index.html" class="d-flex align-items-center">
          <span class="sitename">APP TRPL 2A</span>
        </a>
        <div class="footer-contact pt-3">
          <p>Fathiyyah Ermita Sari</p>
          <p>Limau Manis, Padang</p>
          <p class="mt-3"><strong>Phone:</strong> <span>+6281379201773</span></p>
          <p><strong>Email:</strong> <span>apptrpl2A@gmail.com</span></p>
        </div>
      </div>

      <!-- Right Side: Follow Us -->
      <div class="col-lg-4 col-md-6 text-end">
        <h4>Follow Us</h4>
        <div class="social-links d-flex justify-content-end">
          <a href="" class="mx-2"><i class="bi bi-twitter"></i></a>
          <a href="" class="mx-2"><i class="bi bi-facebook"></i></a>
          <a href="" class="mx-2"><i class="bi bi-instagram"></i></a>
          <a href="" class="mx-2"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="container copyright text-center mt-4">
    <p>© <span>Copyright</span> <strong class="px-1 sitename">APP TRPL 2A</strong> <span>All Rights Reserved</span></p>
  </div>
</footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>