<?php
session_start();
require 'includes/inc_koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <title>App</title>
</head>
<body>

<!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2">
      <img
        src="views/logo.png"
        height="60"
        alt="Letris logo"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">App</a>
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
        <button type="button" class="btn btn-primary me-3" onclick="window.location.href='login.php';">
          Login
        </button>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- navbar end -->

<header class="py-5 bg-image-full" style="background: rgb(131,58,180); background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);">
    <div class="text-center my-5">
        <img class="img-fluid rounded-circle mb-4" style="width: 15hv;" src="views/logo.png" alt="Logo letris" />
        <h1 class="text-white fs-3 fw-bolder">BioData Siswa Letris 2</h1>
        <!-- <p class="text-white-50 mb-0">Sebuah Project Kelompok</p> -->
    </div>
</header>

<!-- <div class="row">
  <div class="text-center">
    <a href="siswa/index.php" class="btn btn-primary btn-lg mt-5">Lihat Data Siswa</a>
    <a href="jurusan/index.php" class="btn btn-danger  btn-lg mt-5">Lihat Data Jurusan</a>
  </div>
</div> -->

</body>
</html>

<?php
include("includes/inc_footer.php");
?>