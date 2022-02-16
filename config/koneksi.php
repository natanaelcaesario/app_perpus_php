<?php
session_start();
define('BASE_URL', 'http://localhost/app_perpus_php/');
$server = "localhost";
$user = "root";
$passwd = "";
$dbs = "db_perpus_php";
$rp = "RP.";
$konek = mysql_connect($server, $user, $passwd)
    or die("Gagal konek ke server MySQL" . mysql_error());
$bukadb = mysql_select_db($dbs)
    or die("Gagal membuka database $dbs" . mysql_error());
