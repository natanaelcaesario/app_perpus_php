<?php
include "../config/koneksi.php";
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$kelas = $_POST['kelas'];
$no_telp = $_POST['no_telp'];
$level = "anggota";

$simpan = mysql_query("INSERT INTO yo_anggota (id_anggota, nama, username, password, alamat,email, kelas, no_telp, photo ,level) values 
		('', '$nama', '$username','$password','$alamat','$email','$kelas','$no_telp','default.png','$level')", $konek)
    or die("Gagal Simpan" . mysql_error());
if ($simpan) {
    echo ("<script LANGUAGE='JavaScript'>
					window.alert('Berhasil simpan');
					window.location.href='" . BASE_URL . "';
					</script>");
}
?>

<script language="JavaScript">
    document.location = ('../')
</script>