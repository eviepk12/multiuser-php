<?php
session_start();
require '../includes/inc_koneksi.php';

if (isset($_POST['hapus_data_siswa'])) {
    $id_siswa = mysqli_real_escape_string($koneksi, $_POST['hapus_data_siswa']);

    $query = "DELETE FROM siswa WHERE id='$id_siswa'";
    $query_run = mysqli_query($koneksi, $query);

    if ($query_run) {
        $_SESSION['message'] = "Data Siswa Berhasil Dihapus";
        header("Location: ../viewsadmin_siswa.php");
        exit(0);
    }
    else {
        $_SESSION['message'] = "Data Siswa Gagal Dihapus";
        header("Location: ../views/admin_siswa.php");
        exit(0);
    }
}

if (isset($_POST['ubah_data_siswa'])) {
    $id_siswa = mysqli_real_escape_string($koneksi, $_POST['id_siswa']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);

    $query = "UPDATE siswa SET nama='$nama', email='$email', no_hp='$no_hp', alamat='$alamat' ,jurusan='$jurusan,' WHERE id='$id_siswa'";
    $query_run = mysqli_query($koneksi, $query);

    if($query_run) {
        $_SESSION['message'] = "Data Siswa Tealh Berhasil Diubah";
        header("Location: ../views/admin_siswa.php");
        exit(0);
    }
    else {
        $_SESSION['message'] = "Data Siswa Gagal Diubah";
        header("Location: ../views/crud_edit_siswa.php");
        exit(0);
    }
}

if (isset($_POST['simpan'])) {
    $nis = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);

    $query = "INSERT INTO siswa (nama, email, no_hp, alamat,jurusan) VALUES ('$nama', '$email', '$no_hp', '$alamat', '$jurusan')";

    $query_run = mysqli_query($koneksi, $query);
    if($query_run) {
        $_SESSION['message'] = "Data Siswa Berhasil Disimpan";
        header("Location: ../views/admin_siswa.php");
        exit(0);
    }
    else {
        $_SESSION['message'] = "Data Siswa Gagal Disimpan";
        header("Location: ../views/crud_tambah_siswa.php");
        exit(0);
    }
}