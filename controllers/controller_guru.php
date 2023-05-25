<?php
session_start();
require '../includes/inc_koneksi.php';

if (isset($_POST['hapus_data_guru'])) {
    $id_guru = mysqli_real_escape_string($koneksi, $_POST['hapus_data_guru']);

    $query = "DELETE FROM guru WHERE id='$id_guru'";
    $query_run = mysqli_query($koneksi, $query);

    if ($query_run) {
        $_SESSION['message'] = "Data Guru Berhasil Dihapus";
        header("Location: ../views/admin_guru.php");
        exit(0);
    }
    else {
        $_SESSION['message'] = "Data Guru Gagal Dihapus";
        header("Location: ../views/admin_guru.php");
        exit(0);
    }
}

if (isset($_POST['ubah_data_guru'])) {
    $id_guru = mysqli_real_escape_string($koneksi, $_POST['id_guru']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $id_mapel = mysqli_real_escape_string($koneksi, $_POST['id_mapel']);

    $query = "UPDATE guru SET nama='$nama', email='$email', no_hp='$no_hp', alamat='$alamat', id_mapel='$id_mapel' WHERE id='$id_guru'";
    $query_run = mysqli_query($koneksi, $query);

    if($query_run) {
        $_SESSION['message'] = "Data Guru Tealh Berhasil Diubah";
        header("Location: ../views/admin_guru.php");
        exit(0);
    }
    else {
        $_SESSION['message'] = "Data Guru Gagal Diubah";
        header("Location: ../views/crud_edit_guru.php");
        exit(0);
    }
}

if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $id_mapel = mysqli_real_escape_string($koneksi, $_POST['id_mapel']);

    $query = "INSERT INTO guru (nama, email, no_hp, alamat, id_mapel) VALUES ('$nama', '$email', '$no_hp', '$alamat', '$id_mapel')";

    $query_run = mysqli_query($koneksi, $query);
    if($query_run) {
        $_SESSION['message'] = "Data Guru Berhasil Disimpan";
        header("Location: ../views/admin_guru.php");
        exit(0);
    }
    else {
        $_SESSION['message'] = "Data Guru Gagal Disimpan";
        header("Location: ../views/crud_tambah_guru.php");
        exit(0);
    }
}