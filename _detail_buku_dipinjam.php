<?php
include "config/koneksi.php";
include "config/library.php";
$id = $_GET['id'];

$sql_news = "SELECT * FROM yo_peminjaman INNER JOIN yo_buku on yo_buku.id_buku=yo_peminjaman.id_buku INNER JOIN yo_anggota on yo_anggota.id_anggota=yo_peminjaman.id_anggota where id_peminjam='$id'";
$qry_news = mysql_query($sql_news)
  or die("Gagal query tampil");

?>

<div class="col-lg-12">
  <div>
    *Denda telat Rp.1.000/hari<br>
    *Durasi Pengembalian 7 hari
  </div>
  <hr>

  <div class="panel panel-info">
    <div class="panel-heading"><a href="javascript:peminjaman();" style="color:white"><i class="fa fa-arrow-left"></i></a> Detail Buku</div>
    <div class="panel-body table-responsive">
      <form action="fungsi/+kembali.php" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>foto</th>
              <th>Judul</th>
              <th>Isbn</th>
              <th>Tahun Terbit</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $nomer = 1;
            while ($data_news = mysql_fetch_array($qry_news)) {
              $nomer++;
              $id_anggota  = $data_news['id_anggota'];
              $id_peminjaman = $data_news['id_peminjam'];
              $id = $data_news['id_buku'];
              $status = $data_news['status_peminjaman'];
              $judul = $data_news['judul'];
              $nama = $data_news['nama'];
              $isbn = $data_news['Isbn'];
              $tahun = $data_news['tahun_terbit'];
              $foto = $data_news['gambar'];
              $deskripsi = $data_news['deskripsi'];
              $a = '07';
              $date = date("Y-m-d");
              $tgl_pinjam = $data_news['tgl_pinjam'];
              $tgl_pinjam1 = substr($tgl_pinjam, 8, 10);
              $tgl_pinjam2 = $tgl_pinjam1 + $a;
              $tgl_pinjam3 = substr($tgl_pinjam, 0, 8);
              $tgl_sekarang = substr($date, 8, 10);
              $selisih_telat = $tgl_sekarang - $tgl_pinjam2;
              $denda = $selisih_telat * '1000';
              $tgl_sekarang = substr($date, 8, 10);
            ?>
              <tr>
                <td hidden>
                  <input type="text" name="id_peminjaman" class="form-control" value="<?php echo $id_peminjaman ?>">
                  <input type="text" name="id_buku" class="form-control" value="<?php echo $id ?>">
                  <input type="text" name="id_anggota" class="form-control" value="<?php echo $id_anggota; ?>">
                  <input type="text" name="tgl_pinjam" class="form-control" value="<?php echo $tgl_pinjam ?>">
                  <input type="text" name="tgl_kembali" class="form-control" value="<?php echo $date ?>">
                  <input type="text" name="denda" class="form-control" value="<?php if ($tgl_pinjam2 < $tgl_sekarang) {
                                                                                echo number_format($denda);
                                                                              } else {
                                                                                echo "-";
                                                                              } ?>">
                </td>
                <td><?= $nomer; ?></td>
                <td><img src="assets/buku/<?php echo $foto ?>" width="100px"></td>
                <td><?php echo $judul ?></td>
                <td><?php echo $isbn ?></td>
                <td><?php echo $tahun ?></td>
                <td><?php echo $deskripsi ?></td>
                <?php if ($status == 1) { ?>
                  <td><button type="submit" class="btn btn-info btn-circle btn-flat">Kembalikan</button></td>
                <?php } else { ?>
                  <td><a class="btn btn-info btn-circle btn-flat disabled">Kembalikan</a></td>
                <?php } ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>

    </div>
  </div>

  <div class="panel panel-default">

    <div class="panel-body">

      <div class="form-group" hidden>
        <?php
        if ($tgl_pinjam2 < $tgl_sekarang) { ?>
          <div>
            <font color="red">*Anda terkena denda karena Telat <?php echo $selisih_telat ?> hari.</font><br>
            <font color="red">*Denda = <?php echo "Rp." . number_format($denda) ?></font>
          </div>
        <?php } ?>
        <label for="inputEmail3" class="col-sm-3 control-label">id_peminjaman</label>
        <div class="col-sm-9">
          <input type="text" name="id_peminjaman" class="form-control" value="<?php echo $id_peminjaman ?>" readonly>
          <input type="hidden" name="id_buku" class="form-control" value="<?php echo $id ?>">
          <input type="hidden" name="id_anggota" class="form-control" value="<?php echo $id_anggota ?>" />
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Tanggal harus Kembali</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" value="<?php echo $tgl_pinjam3 . $tgl_pinjam2 ?>" readonly>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Kembali</label>
        <div class="col-sm-9">
          <input type="text" name="tgl_kembali" class="form-control" value="<?php echo $date ?>" readonly>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Denda</label>
        <div class="col-sm-9">
          <input type="text" name="denda" class="form-control" value="<?php if ($tgl_pinjam2 < $tgl_sekarang) {
                                                                        echo number_format($denda);
                                                                      } else {
                                                                        echo "-";
                                                                      } ?>" readonly>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>