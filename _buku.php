<?php
include "config/koneksi.php";
$sql_news = "SELECT * FROM yo_buku INNER JOIN yo_pengarang on yo_buku.kd_pengarang=yo_pengarang.kd_pengarang INNER JOIN yo_penerbit on yo_buku.kd_penerbit=yo_penerbit.kd_penerbit";
$qry_news = mysql_query($sql_news)
  or die("Gagal query tampil");
$get_all_outof = "UPDATE yo_buku SET status = 'Tidak Tersedia' where jumlah < 1";
mysql_query($get_all_outof, $konek)
  or die("Perubahan data gagal" . mysql_error());
$nomer = 0;
?>
<div class="warper container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <?php if ($_SESSION['level'] == "admin") { ?>
        <a class="btn btn-primary" href="javascript:tambah_buku();" style="margin-bottom:15px;"> <i class="fa fa-plus"></i> Tambah Data Buku</a>
      <?php } ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          Buku <small>List</small>
        </div>
        <div class="panel-body table-responsive">
          <table class="table table-striped no-margn" id="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($data_news = mysql_fetch_array($qry_news)) {
                $id = $data_news['id_buku'];
                $nomer++; ?>
                <tr>
                  <td><?= $nomer; ?></td>
                  <td><img src="assets/buku/<?= $data_news['gambar'] ?>" width="100px"></td>
                  <td><?php echo $data_news['judul']; ?></td>
                  <td><?php echo $data_news['pengarang']; ?></td>
                  <td><?php echo $data_news['penerbit']; ?></td>
                  <td><?php echo $data_news['jumlah']; ?></td>
                  <td><?php echo $data_news['status']; ?></td>
                  <td>
                    <?php if ($_SESSION['level'] == "admin") { ?>

                      <a href="javascript:edit(<?php echo $id ?>);" class="btn btn-warning btn" style="margin-right:2px; "><i class="fa fa-edit"></i></a>
                      <a style="margin-right:2px; " href="fungsi/hapus_buku.php?idhapus=<?php echo $id ?>" class="btn btn-danger " onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></a>
                      <a href="javascript:detail(<?php echo $id ?>);" class="btn btn-danger "><i class="fa fa-eye"></i></a>

                    <?php } else { ?>
                      <a href="javascript:detail(<?php echo $id ?>);" class="btn btn-danger btn-xs">Detail</a>
                    <?php } ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>