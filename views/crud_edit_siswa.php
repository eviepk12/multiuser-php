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
<?php  include('../includes/inc_message.php') ?>

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
                            <div class="mb-3">
                                <label>Email Siswa</label>
                                <input type="email" name="email" value="<?= $siswa['email']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Nomor Handphone</label>
                                <input type="text" name="no_hp" value="<?= $siswa['no_hp']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                            <div class="mb-3">
                                <label>Alamat</label>
                                <input type="text" name="alamat" value="<?= $siswa['alamat']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">

                                <label>Jurusan</label>
                                <select class="form-control" name="jurusan" aria-placeholder="Pilih Jurusan">

                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                    <option value="Multimedia">Multimedia</option>
                                    <option value="Akutansi">Akutansi</option>
                                    <option value="Perbankan_Syariah">Perbankan Syariah</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="ubah_data_siswa" class="btn btn-primary">Ubah Data Siswa</button>
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