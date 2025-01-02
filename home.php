<main class="main">

<!-- Hero Section -->
<section id="hero" class="hero section light-background">

  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
        <h1>Welcome to <span>APP TRPL 2A</span></h1>
        <p>Kelas 2A TRPL: Bersama Membangun Inovasi Digital!</p>
        <div class="d-flex">
          <a href="login.php" class="btn-get-started" class="glightbox btn-watch-video d-flex align-items-center">Login</a>

        </div>
      </div>
    </div>
  </div>

</section><!-- /Hero Section -->




<!-- Services Section -->
<section id="services" class="services section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Berita Terkini</h2>
    <p><span>Check Our</span> <span class="description-title"> Berita</span></p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">
      <?php
          include 'koneksi.php';
          $d=isset($_GET['d']) ? $_GET['d'] : 'home';
          switch ($d) {
              case 'home'  :
          
          $ambil_berita=mysqli_query($db, "SELECT * FROM berita ORDER BY id DESC LIMIT 6");
          while ($data_berita=mysqli_fetch_array($ambil_berita)){
      ?>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item position-relative">
          <img src="admin/images/<?= $data_berita['file_upload']?>" class="card-img-top" height="200">
          <a href="#" class="">
            <h3 class="card-title"><?= $data_berita['judul_berita']?></h3>
          </a>
          <p class="card-text"><?= substr($data_berita['isi_berita'],0,250)?></p>
          <a href="?p=berita&d=detail&id=<?= $data_berita['id'] ?>" class="btn btn-primary">Readmore..</a>
        </div>
      </div>
      <?php
        }
      break;

      case 'detail' :
          $ambil_berita=mysqli_query($db,"SELECT * FROM berita WHERE id='$_GET[id]'");
          $data_berita=mysqli_fetch_array($ambil_berita)
      ?>
      
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="">
          <img src="admin/images/<?= $data_berita['file_upload']?>" class="card-img-top" height="200">
          <a href="#" class="">
            <h3 class="card-title"><?= $data_berita['judul_berita']?></h3>
          </a>
          <p class="card-text"><?= substr($data_berita['isi_berita'],0,250)?></p>
          <a href="#" onclick="history.back()" class="btn btn-primary">Kembali..</a>
        </div>
      </div>
      <?php
        }
?>
      <!-- End Service Item -->
      
    

      

    </div>

  </div>

</section><!-- /Services Section -->

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section dark-background">

  <img src="assets/img/testimonials-bg.jpg" class="testimonials-bg" alt="">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="swiper init-swiper">
      <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 5000
          },
          "slidesPerView": "auto",
          "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
          }
        }
      </script>

          <div class="testimonial-item">
          <img src="/trpl2a/kasus/images/tya.jpg" class="testimonial-img" alt="">
            <h3>fathiyyah ermita sari</h3>
            <h4>Ceo &amp; Founder</h4>
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
              <i class="bi bi-quote quote-icon-left"></i>
              <span>"Belajar adalah investasi terbaik untuk masa depan yang lebih cerah."</span>
              <i class="bi bi-quote quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->


  </div>

</section><!-- /Testimonials Section -->



</main>

