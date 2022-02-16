<?php
include "config/koneksi.php";
$sql_news = "SELECT*from yo_anggota";
$qry_news = mysql_query($sql_news);
$nomer = 0;

?>
<div class="warper container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <a class="btn btn-primary" href="javascript:tambah_anggota();" style="margin-bottom:15px;"> <i class="fa fa-plus"></i> Tambah Anggota</a>
      <div class="panel panel-default">
        <div class="panel-heading">
          Buku <small>List</small>
        </div>
        <div class="panel-body table-responsive">
          <table class="table table-striped no-margn">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>

                <th>Alamat</th>
                <th>Nomer Telefon</th>
                <?php
                if ($_SESSION['level'] == "admin") { ?>
                  <th>Password</th>
                  <th>Aksi</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <?php while ($data_news = mysql_fetch_array($qry_news)) {
                $nomer++; ?>
                <tr>
                  <td><?php echo $nomer; ?></td>
                  <td><?php echo $data_news['nama']; ?></td>
                  <td><?php echo $data_news['username']; ?></td>
                  <td><?php echo $data_news['alamat']; ?></td>
                  <td><?php echo $data_news['no_telp']; ?></td>
                  <?php if ($_SESSION['level'] == "admin") { ?>
                    <td><?php echo $password = $data_news['password']; ?></td>
                    <td>
                      <a href="javascript:editanggota(<?php echo $data_news['id_anggota']; ?>);" class="btn btn-warning btn" style="margin-right:2px;"><i class="fa fa-edit"></i></a>
                      <a href="fungsi/hapus_anggota.php?idhapus=<?php echo $data_news['id_anggota']; ?>" class="btn btn-danger " onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></a>
                    </td>
                  <?php } ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>