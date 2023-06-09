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
                        $query = "SELECT 
                        guru.id AS id_guru, 
                        guru.nama AS nama_guru, 
                        guru.email AS email_guru, 
                        guru.no_hp AS no_hp_guru,
                        mata_pelajaran.mata_pelajaran AS nama_mapel
                        FROM guru, mata_pelajaran WHERE mata_pelajaran.id = guru.id_mapel";
                        $query_run = mysqli_query($koneksi, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $guru = mysqli_fetch_array($query_run);
                    ?>
                            <div class="mb-3">
                                <label>Nama Guru</label>
                                <p class="form-control">
                                    <?= $guru['nama_guru']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Email Guru</label>
                                <p class="form-control">
                                    <?= $guru['email_guru']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Nomor Handphone</label>
                                <p class="form-control">
                                    <?= $guru['no_hp_guru']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Mata Pelajaran</label>
                                <p class="form-control">
                                    <?= $guru['nama_mapel']; ?>
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