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

<div class="container text-center">
    <h1>Halaman Siswa</h1>
    <p>Selamat datang di halaman siswa</p>
</div>


<div class="card-body m-5">
    <table class="table table-bordered table-striped">
        <?php if (in_array("guru", $_SESSION['admin_akses'])) { ?>
            <a href="crud_tambah_siswa.php" class="btn btn-primary float-end m-1">Tambah Data Siswa</a>
        <?php } ?>
        
        <form action=""></form>
        <a href="rpl_sorted.php" class="btn btn-warning float-start m-1">RPL</a>
        <a href="ak_sorted.php" class="btn btn-warning float-start m-1">AK</a>
        <a href="mm_sorted.php" class="btn btn-warning float-start m-1">MM</a>
        <a href="pbs_sorted.php" class="btn btn-warning float-start m-1">PBS</a>
        <thead>
            <tr>
                <!-- <th>NIS</th> -->
                <th>No.</th>
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
            siswa.id AS id_siswa,
            siswa.alamat AS alamat_siswa,
            siswa.nama AS nama_siswa, 
            siswa.email AS email_siswa, 
            siswa.no_hp AS no_hp_siswa,
            jurusan.jurusan AS nama_jurusan
            FROM siswa, jurusan WHERE jurusan.id = siswa.id_jurusan";
            $query_run = mysqli_query($koneksi, $query); # melakukan query ke database mysqli_query(connection, query, resultmode)
            
            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $siswa) {
                    ?>

                    <tr>
                        <td>
                            <?= $number++ ?>
                        </td>
                        <td>
                            <?= $siswa['nama_siswa'] ?>
                        </td>
                        <td>
                            <?= $siswa['email_siswa'] ?>
                        </td>
                        <td>
                            <?= $siswa['no_hp_siswa'] ?>
                        </td>
                        <td>
                            <?= $siswa['alamat_siswa'] ?>
                        </td>
                        <td>
                            <?= $siswa['nama_jurusan'] ?>
                        </td>

                        <td>
                            <a href="crud_detail_siswa.php?id=<?= $siswa['id_siswa']; ?>" class="btn btn-info btn-sm">Detail</a>
                            <?php if (in_array("guru", $_SESSION['admin_akses'])) { ?>
                                <a href="crud_edit_siswa.php?id=<?= $siswa['id_siswa']; ?>" class="btn btn-success btn-sm">Ubah
                                    Data</a>
                                <form action="../controllers/controller_siswa.php" method="POST" class="d-inline">
                                    <button type="submit" name="hapus_data_siswa" value="<?= $siswa['id_siswa']; ?>"
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
    <!-- </table>
    <form action="../controllers/controller_siswa.php" method="POST">
        <label for="jurusan">Sortir Jurusan</label>
        <select class="form-control" name="id_jurusan">
            
            <option selected value="*"></option>
            
            <?php
            $query = "SELECT * FROM jurusan";
            $query_run = mysqli_query($koneksi, $query);
            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $jurusan) {
                    ?>
                    <option value="<?= $jurusan['id'] ?>">
                        <?= $jurusan['jurusan'] ?>
                    </option>
                    <?php
                }
            } else {
                echo "Belum Ada Data Jurusan";
            }
            ?>

        </select>

        <div class="m-3">
            <button type="submit" name="sortir_jurusan" class="btn btn-primary">Sortir Jurusan</button>
        </div>

    </form> -->
</div>

<?php
include("../includes/inc_footer.php");
?>