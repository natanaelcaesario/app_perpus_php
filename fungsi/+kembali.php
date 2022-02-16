<?php
include "../config/koneksi.php";
include "../config/library.php";
$id = mysql_real_escape_string($_POST['id_buku']);
$id_anggota = mysql_real_escape_string($_POST['id_anggota']);
$id_peminjaman = mysql_real_escape_string($_POST['id_peminjaman']);
$tgl_pinjam = mysql_real_escape_string($_POST['tgl_pinjam']);
$tgl_kembali = mysql_real_escape_string($_POST['tgl_kembali']);
$denda = mysql_real_escape_string($_POST['denda']);

$sql_ubah = "UPDATE yo_buku SET jumlah=jumlah + 1 WHERE id_buku='$id'";
mysql_query($sql_ubah, $konek)
	or die("Memasukan data produk gagal" . mysql_error());


$sql_ubah2 = "UPDATE yo_peminjaman SET status_peminjaman = '1' WHERE id_buku='$id' AND id_anggota='$id_anggota'";
mysql_query($sql_ubah2, $konek)
	or die("Memasukan data produk gagal" . mysql_error());

$sql_simpan3 = "INSERT INTO yo_pengembalian (id_kembali,id_buku,id_pinjam,tgl_kembali,denda) VALUES ('','$id' ,'$id_peminjaman','$tgl_kembali','$denda')";
mysql_query($sql_simpan3, $konek)
	or die("Memasukan data produk gagal" . mysql_error());
if ($sql_ubah and $sql_ubah and $sql_simpan3) {
	echo ("<script LANGUAGE='JavaScript'>
					window.alert('Berhasil simpan');
					window.location.href='" . BASE_URL . "';
					</script>");
} else {
	echo "gagal";
}
