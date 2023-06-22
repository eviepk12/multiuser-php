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
                <h4>Edit Data Guru <a href="../views/admin_depan.php" class="btn btn-danger float-end">Kembali</a></h4>
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

                        <form action="../controllers/controller_guru.php" method="POST">
                            <input type="hidden" name="id_guru" value="<?= $guru['id']; ?>">

                            <div class="mb-3">
                                <label>Nama Guru</label>
                                <input type="text" name="nama" value="<?= $guru['nama']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email Guru</label>
                                <input type="email" name="email" value="<?= $guru['email']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Nomor Handphone</label>
                                <input type="text" name="no_hp" value="<?= $guru['no_hp']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" value="<?= $guru['alamat']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">

                                    <label>Jurusan</label>
                                    <select class="form-control" name="id_mapel">

                                        <?php
                                        $query = "SELECT * FROM mata_pelajaran";
                                        $query_run = mysqli_query($koneksi, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $mapel) {
                                                ?>
                                                <option value="<?= $mapel['id'] ?>">
                                                    <?= $mapel['mata_pelajaran'] ?>
                                                </option>
                                                <?php
                                            }
                                        } else {
                                            echo "Belum Ada Data Mata Pelajaran";
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="ubah_data_guru" class="btn btn-primary">Ubah Data Guru</button>
                                </div>
                        </form>
                        <?php
                    } else {
                        echo "<h4> Data Guru Tidak Ditemukan </h4>";
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