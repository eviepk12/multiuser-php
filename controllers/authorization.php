<?php
session_start();
if (isset($_SESSION['admin_username'])) {
    header("location:views/admin_depan.php");
}
include("includes/inc_koneksi.php");
$username = "";
$password = "";
$err = "";
if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    if ($username == '' or $password == '') {
        $err .= $_SESSION['message'] = "Enter Username and Password";
    }
    if (empty($err)) {
        $sql1 = "select * from admin where username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if (isset($r1[0]) and $r1['password'] != md5($password)) {
            $err .=  $_SESSION['message'] = "Account not found";
        }
    }
    if (empty($err)) {
        $login_id = $r1['login_id'];
        $sql1 = "select * from admin_akses where login_id = '$login_id'";
        $q1 = mysqli_query($koneksi, $sql1);
        while ($r1 = mysqli_fetch_array($q1)) {
            $akses[] = $r1['akses_id']; //spp, guru, siswa
        }
        if (empty($akses)) {
            $err .=  $_SESSION['message'] = "You don't have access";
        }
    }
    if (empty($err)) {
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_akses'] = $akses;
        header("location:views/admin_depan.php");
        exit();
    }
}
?>