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
        <div class="card-header">
            <h4>Detail Data Siswa <a href="admin_depan.php" class="btn btn-danger float-end">Kembali</a> </h4>
        </div>

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
            FROM siswa, jurusan WHERE jurusan.id = siswa.id_jurusan AND jurusan.id = 2";
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
</div>

<?php
include("../includes/inc_footer.php");
?>