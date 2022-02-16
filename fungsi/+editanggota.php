 <?php
    include "../config/koneksi.php";
    include "../config/library.php";

    if (isset($_POST['tambahanggota'])) {
        $id = mysql_real_escape_string($_POST['id_anggota']);
        $nama = mysql_real_escape_string($_POST['nama']);
        $username = mysql_real_escape_string($_POST['username']);
        $password = mysql_real_escape_string($_POST['password']);
        $alamat = mysql_real_escape_string($_POST['alamat']);
        $email = mysql_real_escape_string($_POST['email']);
        $no_telp = mysql_real_escape_string($_POST['no_telp']);
        $level = 'admin';


        $simpan = mysql_query("UPDATE yo_anggota SET nama ='$nama',username = '$username',password = '$password',alamat = '$alamat',email = '$email',no_telp = '$no_telp' WHERE id_anggota = '$id'", $konek)
            or die("Gagal Simpan" . mysql_error());
        echo ("<script LANGUAGE='JavaScript'> window.alert('Berhasil mengubah'); window.location.href='" . BASE_URL . "';</script>");
    }
    ?>
