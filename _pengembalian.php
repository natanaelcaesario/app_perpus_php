<?php
include "config/koneksi.php";
$sql_news = "SELECT * from yo_pengembalian INNER JOIN yo_peminjaman on yo_peminjaman.id_peminjam = yo_pengembalian.id_pinjam INNER JOIN yo_anggota ON yo_peminjaman.id_anggota = yo_anggota.id_anggota inner join yo_buku ON yo_peminjaman.id_buku = yo_buku.id_buku";
$qry_news = mysql_query($sql_news)
  or die("Gagal query tampil");
?>
<div class="page-header">
  <h1>Data Pengembalian Buku<small>list</small></h1>
</div>


<div class="row">
  <div class="col-md-9">
    <div class="panel panel-default">
      <div class="panel-body table-responsive">
        <table class="table table-striped no-margn">
          <thead>
            <tr>
              <th>ID</th>
              <th>Peminjam</th>
              <th>Judul Buku</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Denda</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $nomer = 1;
            while ($data_news = mysql_fetch_array($qry_news)) {
              $tgl_pinjam = $data_news['tgl_pinjam'];
              $username = $data_news['username'];
              $judul_buku = $data_news['judul'];
              $tgl_kembali = $data_news['tgl_kembali'];
              $denda = $data_news['denda'];
            ?>
              <tr>
                <td><?php echo $nomer ?></td>
                <td><?php echo $username ?></td>
                <td><?php echo $judul_buku ?></td>
                <td><?php echo $tgl_pinjam ?></td>
                <td><?php echo $tgl_kembali ?></td>
                <td><?php echo $denda ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>