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

    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h4>Edit Data Siswa <a href="../views/admin_depan.php" class="btn btn-danger float-end">Kembali</a></h4>
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

                        <form action="../controllers/controller_siswa.php" method="POST">
                            <input type="hidden" name="id_siswa" value="<?= $siswa['id']; ?>">

                            <div class="mb-3">
                                <label>Nama Siswa</label>
                                <input type="text" name="nama" value="<?= $siswa['nama']; ?>" class="form-control">
                            </div>

                            <label>Status SPP</label>
                            <select class="form-control" name="status_spp">
                                <option value="0">Belum Lunas</option>
                                <option value="1">Sudah Lunas</option>
                            </select>
                    </div>
                    
                    <div class="m-3">
                        <button type="submit" name="ubah_status_spp" class="btn btn-primary">Ubah Status SPP</button>
                    </div>
                    </form>
                    <?php
                    } else {
                        echo "<h4> Data Siswa Tidak Ditemukan </h4>";
                    }
                }
                ?>
        </div>
    </div>
</div>
</div>

<?php
include("../includes/inc_footer.php");
?>