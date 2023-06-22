<?php
include("../includes/inc_header.php");
if (!in_array("spp", $_SESSION['admin_akses'])) {
    echo "Kamu tidak punya akses";
    include("inc_footer.php");
    exit();
}
?>

<div class="container text-center">
<h1>Halaman SPP</h1>
<p>Selamat datang di halaman spp</p>
</div>


<div class="card-body m-5">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <!-- <th>NIS</th> -->
                <th>No.</th>
                <th>Nama Siswa</th>
                <th>Status SPP</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $number = 1;
            $query = "SELECT 
            siswa.id AS id_siswa,
            siswa.nama AS nama_siswa, 
            siswa.spp as status_spp
            FROM siswa";
            $query_run = mysqli_query($koneksi, $query); # melakukan query ke database mysqli_query(connection, query, resultmode)

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $siswa) {
            ?>

                    <tr>
                        <td><?= $number++ ?></td>
                        <td><?= $siswa['nama_siswa'] ?></td>

                        <?php if($siswa['status_spp'] == 0) {?>
                        <td>Belum Lunas</td>
                        <?php }?>

                        <?php if($siswa['status_spp'] == 1) { ?>
                        <td>Sudah Lunas</td>
                        <?php } ?>

                        <td>
                            <?php if (in_array("admin", $_SESSION['admin_akses'])) { ?>
                            <a href="crud_edit_spp.php?id=<?= $siswa['id_siswa']; ?>" class="btn btn-success btn-sm">Ubah Data</a>

                            <form action="../controllers/controller_siswa.php" method="POST" class="d-inline">
                                <button type="submit" name="hapus_data_siswa" value="<?= $siswa['id_siswa']; ?>" class="btn btn-danger btn-sm">Hapus Data</button>
                            </form>
                            <?php } ?>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "<h5 style='color:red;'>Belum Ada Data Siswa</h5>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include("../includes/inc_footer.php");
?>