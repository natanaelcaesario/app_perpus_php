<?php
include('../config/koneksi.php');
include('../config/library.php');

$direktori = "../assets/buku/";
$date = date("Y-m-d");

if (isset($_POST['tambahbuku'])) {
	$judul = mysql_real_escape_string($_POST['judul']);
	$isbn = mysql_real_escape_string($_POST['isbn']);
	$jumlah = mysql_real_escape_string($_POST['jumlah']);
	$tahun = mysql_real_escape_string($_POST['tahun_terbit']);
	$pengarang = mysql_real_escape_string($_POST['kd_pengarang']);
	$deskripsi = mysql_real_escape_string($_POST['deskripsi']);
	$penerbit = mysql_real_escape_string($_POST['kd_penerbit']);
	$status = "Tersedia";
	// file and get extension
	$gambar_sekarang = $_FILES['gambar']['name'];
	$extension_gambar = pathinfo($gambar_sekarang, PATHINFO_EXTENSION);
	$filename =  strtotime("now") . "_" . $gambar_sekarang;
	$target_path = $direktori . $filename;
	if ($move = move_uploaded_file($_FILES['gambar']['tmp_name'], $target_path)) {
		$simpan = mysql_query("INSERT INTO yo_buku (id_buku,judul,Isbn,tahun_terbit,jumlah,tanggal_masuk,kd_pengarang,kd_penerbit,deskripsi,gambar,status) values 
		('','$judul','$isbn','$tahun','$jumlah','$date','$pengarang','$penerbit','$deskripsi','$filename','$status')", $konek)
			or die("Gagal Simpan" . mysql_error());
		if ($simpan) {
			echo ("<script LANGUAGE='JavaScript'>
					window.alert('Berhasil simpan');
					window.location.href='" . BASE_URL . "';
					</script>");
		}
	}
}

?>
<!-- <script language="JavaScript">
	window.location.replace('/');
</script> -->

</div>