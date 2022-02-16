<?php
include "config/koneksi.php";
include "config/library.php";
$id = mysql_real_escape_string($_GET['id']);
$id_anggota = mysql_real_escape_string($_GET['id_anggota']);
$judul = mysql_real_escape_string($_GET['judul']);
$user = mysql_real_escape_string($_GET['user']);
$nama = mysql_real_escape_string($_GET['nama']);
$stok = mysql_real_escape_string($_GET['stok']);
$deskripsi = mysql_real_escape_string($_GET['deskripsi']);
$tahun = mysql_real_escape_string($_GET['tahun']);
$pengarang = mysql_real_escape_string($_GET['pengarang']);
$penerbit = mysql_real_escape_string($_GET['penerbit']);
$foto = mysql_real_escape_string($_GET['foto']);
$isbn = mysql_real_escape_string($_GET['isbn']);
$sql_ubah = "UPDATE yo_buku SET jumlah=jumlah - 1 WHERE id_buku='$id'";
mysql_query($sql_ubah);
mysql_query("INSERT INTO yo_peminjaman
	(id_peminjam,id_buku,id_anggota,pengarang,penerbit,tgl_pinjam,tahun_terbit,isbn,judul_buku,username,nama,deskripsi,gambar,status)
	VALUES
	('','$id','$id_anggota','$pengarang','$penerbit','$date','$tahun','$isbn','$judul','$user','$nama','$deskripsi','$foto','1')
");

if ($stok == 1) {
	$sql_ubah = "UPDATE yo_buku SET
				status='1'
				WHERE id_buku='$id'";
	mysql_query($sql_ubah);
}

echo ("<script LANGUAGE='JavaScript'> window.alert('Berhasil pinjam buku'); window.location.href='" . BASE_URL . "';</script>");
