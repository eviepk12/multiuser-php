<?php
include("../includes/inc_header.php");
include "../includes/inc_koneksi.php";
if (!in_array("guru", $_SESSION['admin_akses'])) {
    echo "Kamu tidak punya akses";
    include("inc_footer.php");
    exit();
}
?>

<div class="container text-center">
<h1>Halaman Guru</h1>
<p>Selamat datang di halaman guru</p>
</div>


<div class="card-body m-5">
    <table class="table table-bordered table-striped">
        <?php if (in_array("admin", $_SESSION['admin_akses'])) { ?>
            <a href="crud_tambah_guru.php" class="btn btn-primary float-end m-1">Tambah Data Guru</a>
        <?php } ?>
        <thead>
            <tr>
                <!-- <th>NIS</th> -->
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Email</th>
                <th>Nomer Telpon</th>
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $number = 1;
            $query = "SELECT 
            guru.id AS id_guru,
            guru.alamat AS alamat_guru,
            guru.nama AS nama_guru, 
            guru.email AS email_guru, 
            guru.no_hp AS no_hp_guru,
            mata_pelajaran.mata_pelajaran AS nama_mapel
            FROM guru, mata_pelajaran WHERE mata_pelajaran.id = guru.id_mapel";
            $query_run = mysqli_query($koneksi, $query); # melakukan query ke database mysqli_query(connection, query, resultmode)
            
            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $guru) {
                    ?>

                    <tr>
                        <td>
                            <?= $number++ ?>
                        </td>
                        <td>
                            <?= $guru['nama_guru'] ?>
                        </td>
                        <td>
                            <?= $guru['email_guru'] ?>
                        </td>
                        <td>
                            <?= $guru['no_hp_guru'] ?>
                        </td>
                        <td>
                            <?= $guru['alamat_guru'] ?>
                        </td>
                        <td>
                            <?= $guru['nama_mapel'] ?>
                        </td>

                        <td>
                            <a href="crud_detail_guru.php?id=<?= $guru['id_guru']; ?>" class="btn btn-info btn-sm">Detail</a>
                            <?php if (in_array("admin", $_SESSION['admin_akses'])) { ?>
                                <a href="crud_edit_guru.php?id=<?= $guru['id_guru']; ?>" class="btn btn-success btn-sm">Ubah Data</a>
                                <form action="../controllers/controller_guru.php" method="POST" class="d-inline">
                                    <button type="submit" name="hapus_data_guru" value="<?= $guru['id_guru']; ?>"
                                        class="btn btn-danger btn-sm">Hapus Data</button>
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