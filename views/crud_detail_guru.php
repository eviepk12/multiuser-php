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
                    <h4>Detail Data Guru <a href="admin_depan.php" class="btn btn-danger float-end">Kembali</a> </h4>
                </div>

                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $id_guru = mysqli_real_escape_string($koneksi, $_GET['id']);
                        $query = "SELECT * FROM guru WHERE id='$id_guru'";
                        $query_run = mysqli_query($koneksi, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $guru = mysqli_fetch_array($query_run);
                    ?>
                            <div class="mb-3">
                                <label>Nama Guru</label>
                                <p class="form-control">
                                    <?= $guru['nama']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Email Guru</label>
                                <p class="form-control">
                                    <?= $guru['email']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Nomor Handphone</label>
                                <p class="form-control">
                                    <?= $guru['no_hp']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Jurusan Guru</label>
                                <p class="form-control">
                                    <?= $guru['jurusan']; ?>
                                </p>
                            </div>

                    <?php
                        } else {
                            echo "<h4> Data Guru Tidak Ditemukan </h4";
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