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
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Tambahkan Guru <a href="admin_depan.php" class="btn btn-danger float-end">Kembali</a></h4> 
                    </div>
                    <div class="card-body">
                        <form action="../controllers/controller_guru.php" method="POST">
                        <div class="mb-3">
                            <label>Nama Guru</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Email Guru</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Nomor Handphone</label>
                            <input type="text" name="no_hp" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control">
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
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include("../includes/inc_footer.php");
?>