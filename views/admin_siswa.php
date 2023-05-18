<?php
include("../includes/inc_header.php");
include "../includes/inc_koneksi.php";

if (!in_array("siswa", $_SESSION['admin_akses'])) {
    echo "Kamu tidak punya akses";
    include
    include("inc_footer.php");
    exit();
}
?>

<h1>Halaman Siswa</h1>
Selamat datang di halaman siswa

<a href="crud_tambah_siswa.php" class="btn btn-primary float-end m-1">Tambah Data Siswa</a>

<div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <!-- <th>NIS</th> -->
                <th>ID</th>
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
            $query = "SELECT 
            siswa.id AS id_siswa,
            siswa.alamat AS alamat_siswa,
            siswa.nama AS nama_siswa, 
            siswa.email AS email_siswa, 
            siswa.no_hp AS no_hp_siswa,
            siswa.jurusan AS nama_jurusan
            FROM siswa";
            $query_run = mysqli_query($koneksi, $query); # melakukan query ke database mysqli_query(connection, query, resultmode)

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $siswa) {
            ?>

                    <tr>
                        <td><?= $siswa['id_siswa'] ?></td>
                        <td><?= $siswa['nama_siswa'] ?></td>
                        <td><?= $siswa['email_siswa'] ?></td>
                        <td><?= $siswa['no_hp_siswa'] ?></td>
                        <td><?= $siswa['alamat_siswa'] ?></td>
                        <td><?= $siswa['nama_jurusan'] ?></td>
                        
                        <td>
                            <a href="crud_detail_siswa.php?id=<?= $siswa['id_siswa']; ?>" class="btn btn-info btn-sm">Detail</a>
                            <?php if (in_array("guru", $_SESSION['admin_akses'])) { ?>
                            <a href="crud_edit_siswa.php?id=<?= $siswa['id_siswa']; ?>" class="btn btn-success btn-sm">Ubah Data</a>
                            <form action="../controllers/controller.php" method="POST" class="d-inline">
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