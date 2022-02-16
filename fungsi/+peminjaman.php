<?php
include('../config/koneksi.php');
include('../config/library.php');

$direktori = "../assets/anggota/";

if (isset($_POST['tambahpinjam'])) {
    $id_buku = $_POST['id_buku'];
    $id_anggota = $_POST['id_anggota'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $deskripsi = $_POST['deskripsi'];
    $simpan = mysql_query("INSERT INTO yo_peminjaman (id_peminjam,id_buku,id_anggota,tgl_pinjam,deskripsi,status_peminjaman) values 
    	('','$id_buku','$id_anggota','$tgl_pinjam','$deskripsi','1')", $konek)
        or die("Gagal Simpan" . mysql_error());
    echo ("<script LANGUAGE='JavaScript'> window.alert('Berhasil simpan'); window.location.href='" . BASE_URL . "';</script>");
}
