<?php
session_start();
include("inc_koneksi.php");
if (!isset($_SESSION['admin_username'])) {
    header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>App</title>
</head>

<body>

    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2">
                <img src="logo.png" height="60" alt="Letris logo" loading="lazy" style="margin-top: -1px;" />
            </a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="admin_depan.php">Halaman Depan</a>
                    </li>
                    <?php if (in_array("guru", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="admin_guru.php">Halaman Guru</a>
                        </li>
                    <?php } ?>
                    <?php if (in_array("siswa", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="admin_siswa.php">Halaman Siswa</a>
                        </li>
                    <?php } ?>
                    <?php if (in_array("spp", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="admin_spp.php">Halaman SPP</a>
                        </li>
                    <?php } ?>
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-danger me-3" onclick="window.location.href='../logout.php';">
                        Logout
                    </button>
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- navbar end -->

    <div id="app">
        <nav>
            <ul>
            </ul>
        </nav>