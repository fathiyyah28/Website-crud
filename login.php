<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sign In Page">
    <title>Signin</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
      body {
        font-family: 'Poppins', sans-serif;
        background-color: #f0f8ff; /* Background lebih cerah */
      }

      .form-signin {
        max-width: 400px;
        margin: auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }

      .form-signin h1 {
        color: #004085; /* Warna biru yang lebih gelap */
        font-size: 2rem;
        font-weight: 600;
      }

      .form-floating label {
        font-size: 0.875rem;
        color: #007bff; /* Warna label biru */
      }

      .form-control {
        border-radius: 8px;
        border-color: #007bff; /* Warna border input */
      }

      .form-control:focus {
        box-shadow: none;
        border-color: #0056b3; /* Fokus border lebih gelap */
      }

      .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        font-weight: 600;
      }

      .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
      }

      .footer {
        text-align: center;
        font-size: 0.875rem;
        color: #6c757d;
        margin-top: 30px;
      }

      .footer a {
        color: #007bff;
        text-decoration: none;
      }

      .footer a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body class="d-flex align-items-center justify-content-center vh-100">

    <main class="form-signin">
      <form action="" method="post">
        <h1 class="h3 mb-3 fw-normal text-center">Please log in</h1>

        <!-- Email Input -->
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
          <label for="floatingInput">Email address</label>
        </div>

        <!-- Password Input -->
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
          <label for="floatingPassword">Password</label>
        </div>

        <!-- Sign In Button -->
        <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Sign in</button>

        <!-- Footer Section -->
        <p class="footer mt-5 mb-3">
          <small>&copy; 2017-2024 <a href="#">Your Company</a>. All Rights Reserved.</small>
        </p>
      </form>

      <?php


if (isset($_POST['submit'])) {
    include 'koneksi.php';
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $login=mysqli_query($db, "SELECT * FROM user WHERE email='$email' AND  password='$password'");

    $data_user=mysqli_fetch_array($login);
    $hasil_login=mysqli_num_rows($login);

    if ($hasil_login > 0){
        session_start();
        $_SESSION['user']=$data_user['full_name'];
        $_SESSION['user_id']=$data_user['id'];
        $_SESSION['level']=$data_user['level'];
        header('location:admin/index.php');

    }
}
?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
