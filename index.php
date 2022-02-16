 <?php
    include('config/koneksi.php');
    if ((!$_SESSION['username']) and (!$_SESSION['password'])) {
        header("Location: login/");
    }

    error_reporting(0);
    if ($_REQUEST[url] == '') {
        include "header.php";
        include "home.php";
    } else if ($_REQUEST[url] == 'home') {
        include "home.php";
    } else if ($_REQUEST[url] == 'buku') {
        include "_buku.php";
    } else if ($_REQUEST[url] == 'peminjaman') {
        include "_peminjaman.php";
    } else if ($_REQUEST[url] == 'pengembalian') {
        include "_pengembalian.php";
    }
    ?>
     