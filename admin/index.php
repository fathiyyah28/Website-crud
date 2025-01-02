<?php
    session_start();
    if(!isset($_SESSION['user'])){
        echo "<script>alert('Silahkan login untuk mengakses file ini')</script>";
        echo "<script>window.location='../login.php'</script>";
    }
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""> 
    <title>Dashboard - APP TRPLA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"> <!-- Custom Font -->
    <style>
      body {
        font-family: 'Poppins', sans-serif;
        background-color: #f1f9ff;
        color: #007bff; /* Blue text */
        padding-top: 20px;
      }
      .sidebar {
        background-color: #0056b3;
        color: #fff;
        height: 100vh;
        padding-top: 20px;
        position: fixed;
        top: 0;
        right: 0; /* Pindahkan ke kanan */
        width: 250px;
        box-shadow: -2px 0px 5px rgba(0,0,0,0.1);
        z-index: 100;
        overflow-y: auto;
      }
      .sidebar .nav-item .nav-link {
        color: #fff;
        padding: 10px 15px;
        border-radius: 4px;
      }
      .sidebar .nav-item .nav-link:hover {
        background-color: #004085;
        color: #fff;
      }
      .sidebar .nav-item .nav-link.active {
        background-color: #004085;
        color: #fff;
      }
      .sidebar-header {
        text-align: center;
        margin-bottom: 30px;
      }
      .sidebar-header h5 {
        font-size: 1.5rem;
        color: #fff;
      }
      .sidebar-header i {
        font-size: 2rem;
        color: #fff;
      }
      .main-content {
        margin-right: 250px; /* Memberikan margin untuk konten utama */
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: margin-right 0.3s ease-in-out;
      }
      @media (max-width: 768px) {
        .sidebar {
          position: absolute;
          width: 100%;
          height: auto;
        }
        .main-content {
          margin-right: 0;
        }
      }
    </style>
  </head>
  <body>
    
    <!-- Sidebar vertikal di kanan -->
    <div class="sidebar">
      <div class="sidebar-header">
        <h5>APP TRPLA</h5>
        <i class="bi bi-house-door-fill"></i>
      </div>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=home">
            <i class="bi bi-house-fill"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=mhs">
            <i class="bi bi-people-fill"></i> Mahasiswa
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=prodi">
            <i class="bi bi-people-fill"></i> Prodi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=dosen">
            <i class="bi bi-person-fill"></i> Dosen
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=kategori">
            <i class="bi bi-file-earmark-text-fill"></i> Kategori
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=berita">
            <i class="bi bi-file-earmark-post-fill"></i> Berita
          </a>
        </li>
<li class="nav-item"><a class="nav-link <?php 
                            if($_SESSION['level'] != 'admin'){
                                echo "disabled";
                            }?>" href="index.php?p=user">User</a></li>
        <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <i class="bi bi-door-closed"></i> Sign out
        </a>
      </li>
      </ul>
    </div>

    <!-- Konten utama yang berada di sebelah kiri -->
    <div class="container-fluid">
      <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
          <?php
            $page = isset($_GET['p']) ? $_GET['p'] : 'home';

            if ($page == 'home') include 'home.php';
            if ($page == 'mhs') include 'mahasiswa.php';
            if ($page == 'prodi') include 'prodi.php';
            if ($page == 'dosen') include 'dosen.php';
            if ($page == 'kategori') include 'kategori.php';
            if ($page == 'berita') include 'berita.php';
            if ($page == 'user') include 'user.php';
          ?>
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
