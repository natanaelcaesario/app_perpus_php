<?php
include('../config/koneksi.php');
include('../config/library.php');

$direktori = "../assets/anggota/";

if (isset($_POST['tambahanggota'])) {
    $nama = mysql_real_escape_string($_POST['nama']);
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $alamat = mysql_real_escape_string($_POST['alamat']);
    $email = mysql_real_escape_string($_POST['email']);
    $no_telp = mysql_real_escape_string($_POST['no_telp']);
    $level = 0;
    $gambar_sekarang = $_FILES['photo']['name'];
    $extension_gambar = pathinfo($gambar_sekarang, PATHINFO_EXTENSION);
    $filename =  strtotime("now") . "_" . $gambar_sekarang;
    $target_path = $direktori . $filename;

    if ($move = move_uploaded_file($_FILES['photo']['tmp_name'], $target_path)) {
        $simpan = mysql_query("INSERT INTO yo_anggota (id_anggota,nama,username,password,alamat,email,no_telp,photo,level) values 
    	('','$nama','$username','$password','$alamat','$email','$no_telp','$filename','$level')", $konek)
            or die("Gagal Simpan" . mysql_error());
        echo ("<script LANGUAGE='JavaScript'> window.alert('Berhasil simpan'); window.location.href='" . BASE_URL . "';</script>");
    }
}
