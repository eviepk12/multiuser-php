<?php
include("../includes/inc_header.php");
include "../includes/inc_koneksi.php";
if (!in_array("spp", $_SESSION['admin_akses'])) {
    echo "Kamu tidak punya akses";
    include("inc_footer.php");
    exit();
}
?>

<div class="container mt-5">
    <?php include('../includes/inc_message.php') ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h4>Detail Data Siswa <a href="admin_depan.php" class="btn btn-danger float-end">Kembali</a> </h4>
                </div>

                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $id_siswa = mysqli_real_escape_string($koneksi, $_GET['id']);
                        $query = "SELECT * FROM siswa WHERE id='$id_siswa'";
                        $query_run = mysqli_query($koneksi, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $siswa = mysqli_fetch_array($query_run);
                    ?>
                            <div class="mb-3">
                                <label>Nama Siswa</label>
                                <p class="form-control">
                                    <?= $siswa['nama']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Email Siswa</label>
                                <p class="form-control">
                                    <?= $siswa['email']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Nomor Handphone</label>
                                <p class="form-control">
                                    <?= $siswa['no_hp']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Jurusan Siswa</label>
                                <p class="form-control">
                                    <?= $siswa['jurusan']; ?>
                                </p>
                            </div>

                    <?php
                        } else {
                            echo "<h4> Data Siswa Tidak Ditemukan </h4";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("../includes/inc_footer.php");
?>