<?php
include 'koneksi.php';
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