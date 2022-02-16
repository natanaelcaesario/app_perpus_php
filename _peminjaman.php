<?php
include "config/koneksi.php";
$sql_news = "SELECT * FROM yo_peminjaman INNER JOIN yo_buku on yo_buku.id_buku=yo_peminjaman.id_buku INNER JOIN yo_anggota on yo_anggota.id_anggota=yo_peminjaman.id_anggota";
$qry_news = mysql_query($sql_news)
  or die("Gagal query tampil");
$nomer = 0;

?>

<div class="warper container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <a class="btn btn-primary" href="javascript:tambah_peminjaman();" style="margin-bottom:15px;"> <i class="fa fa-plus"></i> Tambah Peminjaman</a>
      <div class="panel panel-default">
        <div class="panel-heading">
          Peminjaman <small>List</small>
        </div>
        <div class="panel-body table-responsive">
          <table class="table table-striped no-margn">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Judul</th>
                <th>Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($data_news = mysql_fetch_array($qry_news)) {
                $nomer++;
              ?>
                <tr>
                  <td><?= $nomer; ?></td>
                  <td><img src="assets/buku/<?php echo $data_news['gambar']; ?>" width="100px"></td>
                  <td><?php echo $data_news['judul']; ?></td>
                  <td><?php echo $data_news['nama'] ?></td>
                  <td><?php echo $data_news['tgl_pinjam'] ?></td>
                  <td><?php if ($data_news['status_peminjaman'] == "1") {
                        echo "belum dikembalikan";
                      } else {
                        echo "sudah dikembalikan";
                      } ?></td>
                  <td>
                    <?php if ($data_news['status_peminjaman'] == "1") { ?>
                      <a href="javascript:detail3(<?php echo $data_news['id_peminjam'] ?>);" class="btn btn-warning "><i class="fa fa-book"></i></a>
                    <?php } ?>
                    <a href="javascript:detail_peminjam(<?php echo $data_news['id_buku'] ?>);" class="btn btn-primary "><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>



  </div>