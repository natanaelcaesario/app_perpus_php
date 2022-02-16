<?php
include_once "../config/koneksi.php";
$idhapus = $_GET['idhapus'];
$sql_hapus = "DELETE FROM yo_buku  WHERE id_buku='$idhapus'";
$hapus = mysql_query($sql_hapus, $konek)
    or die("Gagal perintah hapus" . mysql_error());
if ($hapus) {
    echo ("<script LANGUAGE='JavaScript'> window.alert('Berhasil Hapus'); window.location.href='" . BASE_URL . "';</script>");
}
