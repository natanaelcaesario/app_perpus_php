<!DOCTYPE html>
<html lang="en">



<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PERPUSTAKAAN ONLINE</title>

  <meta name="description" content="">
  <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css" />
  <link rel="stylesheet" href="assets/css/app/timeline.css" />

  <link rel="stylesheet" href="assets/css/plugins/calendar/calendar.css" />

  <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="assets/css/app/app.v1.css" />

  <script type="text/javascript" src="assets/js/jquery.js"></script>
  <script type="text/javascript" src="assets/js/jquery-ui-1.7.2.custom.min.js"></script>
  <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>

  <script type="text/javascript">
    var ajaxRequest;
    var host = window.location.host;

    function getAjax() //fungsi cek apakah web browser mendukung AJAX
    {
      try {
        // Opera 8.0+, Firefox, Safari
        ajaxRequest = new XMLHttpRequest();
      } catch (e) {
        // Internet Explorer Browsers
        try {
          ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
          try {
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
          } catch (e) {
            // Something went wrong
            alert("Your browser broke!");
            return false;
          }
        }
      }
    }

    function edit(id) //fungsi untuk membuka form edit di edit.php
    {

      getAjax();
      ajaxRequest.open("GET", "_edit_buku.php?id=" + id);
      ajaxRequest.onreadystatechange =
        function() {
          var targetDiv = document.getElementById("see"); //membuka edit.php di div edit
          targetDiv.innerHTML = ajaxRequest.responseText;
        }
      ajaxRequest.send(null);
    }

    function editanggota(id) //fungsi untuk membuka form edit di edit.php
    {

      getAjax();
      ajaxRequest.open("GET", "_edit_anggota.php?id=" + id);
      ajaxRequest.onreadystatechange =
        function() {
          var targetDiv = document.getElementById("see"); //membuka edit.php di div edit
          targetDiv.innerHTML = ajaxRequest.responseText;
        }
      ajaxRequest.send(null);
    }

    // function input() //fungsi untuk membuka form edit di edit.php
    // {
    //   getAjax();
    //   ajaxRequest.open("GET", "input_buku.php");
    //   ajaxRequest.onreadystatechange =
    //     function() {
    //       var targetDiv = document.getElementById("see"); //membuka edit.php di div edit
    //       targetDiv.innerHTML = ajaxRequest.responseText;
    //     }
    //   ajaxRequest.send(null);
    // }

    function anggota() {
      $('li').removeClass();
      $("#anggota").addClass('active');
      getAjax();
      ajaxRequest.open("GET", "_anggota.php");
      ajaxRequest.onreadystatechange =
        function() {
          var targetDiv = document.getElementById("see");
          targetDiv.innerHTML = ajaxRequest.responseText;
        }
      ajaxRequest.send(null);
    }

    function see() {
      $('li').removeClass();
      $("#buku").addClass('active');
      getAjax();
      ajaxRequest.open("GET", "_buku.php");
      ajaxRequest.onreadystatechange =
        function() {
          var targetDiv = document.getElementById("see"); //membuka edit.php di div edit
          targetDiv.innerHTML = ajaxRequest.responseText;
        }
      ajaxRequest.send(null);
    }

    function detail(id) //fungsi untuk membuka form edit di edit.php
    {
      getAjax();
      ajaxRequest.open("GET", "_detail_buku.php?id=" + id);
      ajaxRequest.onreadystatechange =
        function() {
          var targetDiv = document.getElementById("see"); //membuka edit.php di div edit
          targetDiv.innerHTML = ajaxRequest.responseText;
        }
      ajaxRequest.send(null);
    }

    function saya(id) //fungsi untuk membuka form edit di edit.php
    {
      getAjax();
      ajaxRequest.open("GET", "bukusaya.php?id_anggota=" + id);
      ajaxRequest.onreadystatechange =
        function() {
          var targetDiv = document.getElementById("see"); //membuka edit.php di div edit
          targetDiv.innerHTML = ajaxRequest.responseText;
        }
      ajaxRequest.send(null);
    }

    function detail3(id_peminjam) //fungsi untuk membuka form edit di edit.php
    {
      getAjax();
      ajaxRequest.open("GET", "_detail_buku_dipinjam.php?id=" + id_peminjam);
      ajaxRequest.onreadystatechange =
        function() {
          var targetDiv = document.getElementById("see"); //membuka edit.php di div edit
          targetDiv.innerHTML = ajaxRequest.responseText;
        }
      ajaxRequest.send(null);
    }

    function detail_bukusaya(id) //fungsi untuk membuka form edit di edit.php
    {
      getAjax();
      ajaxRequest.open("GET", "detail2.php?id=" + id);
      ajaxRequest.onreadystatechange =
        function() {
          var targetDiv = document.getElementById("detail2"); //membuka edit.php di div edit
          targetDiv.innerHTML = ajaxRequest.responseText;
        }
      ajaxRequest.send(null);
    }

    function peminjaman() //fungsi untuk membuka form edit di edit.php
    {
      getAjax();
      ajaxRequest.open("GET", "_peminjaman.php?");
      ajaxRequest.onreadystatechange =
        function() {
          var targetDiv = document.getElementById("see"); //membuka edit.php di div edit
          targetDiv.innerHTML = ajaxRequest.responseText;
        }
      ajaxRequest.send(null);
    }

    function pengembalian() //fungsi untuk membuka form edit di edit.php
    {
      getAjax();
      ajaxRequest.open("GET", "_pengembalian.php?");
      ajaxRequest.onreadystatechange =
        function() {
          var targetDiv = document.getElementById("see"); //membuka edit.php di div edit
          targetDiv.innerHTML = ajaxRequest.responseText;
        }
      ajaxRequest.send(null);
    }

    function detail_peminjam(id) //fungsi untuk membuka form edit di edit.php
    {
      getAjax();
      ajaxRequest.open("GET", "_detail_peminjam.php?id=" + id);
      ajaxRequest.onreadystatechange =
        function() {
          var targetDiv = document.getElementById("see"); //membuka edit.php di div edit
          targetDiv.innerHTML = ajaxRequest.responseText;
        }
      ajaxRequest.send(null);
    }

    function tambah_buku() //fungsi untuk membuka form edit di edit.php
    {
      getAjax();
      ajaxRequest.open("GET", "_tambah_buku.php");
      ajaxRequest.onreadystatechange =
        function() {
          var targetDiv = document.getElementById("see"); //membuka edit.php di div edit
          targetDiv.innerHTML = ajaxRequest.responseText;
        }
      ajaxRequest.send(null);
    }

    function tambah_anggota() //fungsi untuk membuka form edit di edit.php
    {
      getAjax();
      ajaxRequest.open("GET", "_tambah_anggota.php");
      ajaxRequest.onreadystatechange =
        function() {
          var targetDiv = document.getElementById("see"); //membuka edit.php di div edit
          targetDiv.innerHTML = ajaxRequest.responseText;
        }
      ajaxRequest.send(null);
    }

    function tambah_peminjaman() //fungsi untuk membuka form edit di edit.php
    {
      getAjax();
      ajaxRequest.open("GET", "_tambah_peminjaman.php");
      ajaxRequest.onreadystatechange =
        function() {
          var targetDiv = document.getElementById("see"); //membuka edit.php di div edit
          targetDiv.innerHTML = ajaxRequest.responseText;
        }
      ajaxRequest.send(null);
    }
  </script>

  <script src="assets/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/underscore/underscore-min.js"></script>
  <script src="assets/js/bootstrap/bootstrap.min.js"></script>
  <script src="assets/js/myjs.js"></script>
  <script src="assets/js/app/custom.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
</head>

<body data-ng-app>


  <!-- Preloader -->
  <div class="loading-container">
    <div class="loading">
      <div class="l1">
        <div></div>
      </div>
      <div class="l2">
        <div></div>
      </div>
      <div class="l3">
        <div></div>
      </div>

      <div class="l4">
        <div></div>
      </div>
    </div>
  </div>
  <!-- Preloader -->


  <aside class="left-panel h-100">

    <div class="user text-center">
      <img src="assets/anggota/<?php echo $_SESSION['photo']; ?>" class="img-circle" alt="...">
      <h4 class="user-name"><?php echo $_SESSION['nama']; ?></h4>

      <button class="btn user-login btn-xs dropdown-toggle btn-rounded" type="button" data-toggle="dropdown">
        <i class="fa fa-circle status-icon"></i> Available
      </button>
    </div>


    <nav class="navigation">
      <ul class="list-unstyled">
        <?php if ($_SESSION['level'] == "admin") { ?>
          <li class="active" id="home"><a href="./"><i class="fa fa-home"></i><span class="nav-label">Home</span></a></li>
          <li class="" id="anggota"><a href="javascript:anggota();"><i class="fa fa-user"></i><span class="nav-label">List Anggota</span></a></li>
          <li class="" id="anggota"><a href="javascript:peminjaman();"><i class="fa fa-archive"></i><span class="nav-label">Data Peminjaman</span></a></li>
          <li class="" id="anggota"><a href="javascript:pengembalian();"><i class="fa fa-table"></i><span class="nav-label">Data Pengembalian</span></a></li>
        <?php } else { ?>
          <li class="" id="buku"><a href="javascript:see();"><i class="fa fa-book"></i><span class="nav-label">List Buku</span></a></li>
        <?php } ?>
      </ul>
    </nav>

  </aside>
  <!-- Aside Ends-->
  <header class="top-head container-fluid">


    <ul class="nav-toolbar">

      <li><a href="login/logout.php"><i class="fa fa-arrow-right"></i> </a></div>
      </li>
    </ul>
  </header>