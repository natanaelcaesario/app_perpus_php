<?php
include "config/koneksi.php";
$bukusaya = $_SESSION['id_anggota'];
$sql_news = "SELECT *from yo_anggota";
$qry_news = mysql_query($sql_news)
    or die("Gagal query tampil");
$yoah = mysql_num_rows($qry_news);

$sql_news = "SELECT *from yo_buku";
$qry_news = mysql_query($sql_news)
    or die("Gagal query tampil");
$yoah1 = mysql_num_rows($qry_news);

$sql_news = "SELECT yo_anggota.nama,yo_anggota.username,yo_anggota.password,yo_anggota.alamat,yo_anggota.email,yo_anggota.no_telp,yo_anggota.photo
FROM yo_anggota INNER JOIN yo_peminjaman on yo_anggota.id_anggota=yo_peminjaman.id_anggota where yo_peminjaman.id_anggota='$bukusaya'";
$qry_news = mysql_query($sql_news)
    or die("Gagal query tampil");
$yoah2 = mysql_num_rows($qry_news);

$yo_peminjaman = "SELECT * FROM yo_peminjaman";

$peminjaman = mysql_query($yo_peminjaman)
    or die("Gagal query tampil");
$total_pinjam = mysql_num_rows($peminjaman);

$buku_query = "SELECT * FROM yo_buku INNER JOIN yo_pengarang on yo_buku.kd_pengarang=yo_pengarang.kd_pengarang INNER JOIN yo_penerbit on yo_buku.kd_penerbit=yo_penerbit.kd_penerbit";
$exec = mysql_query($buku_query)
    or die("Gagal query tampil");
$get_all_outof = "UPDATE yo_buku SET status = 'Tidak Tersedia' where jumlah < 1";
$exec2 = mysql_query($get_all_outof, $konek)
    or die("Perubahan data gagal" . mysql_error());
$nomer = 0;

$peminjaman_query  = "SELECT * FROM yo_peminjaman INNER JOIN yo_buku on yo_buku.id_buku=yo_peminjaman.id_buku INNER JOIN yo_anggota on yo_anggota.id_anggota=yo_peminjaman.id_anggota";
$qry = mysql_query($peminjaman_query)
    or die("Gagal query tampil");

$yo_pengembalian = "SELECT * from yo_pengembalian INNER JOIN yo_peminjaman on yo_peminjaman.id_peminjam = yo_pengembalian.id_pinjam INNER JOIN yo_anggota ON yo_peminjaman.id_anggota = yo_anggota.id_anggota inner join yo_buku ON yo_peminjaman.id_buku = yo_buku.id_buku";
$pengembalian = mysql_query($yo_pengembalian)
    or die("Gagal query tampil");
?>
<section class="content">

    <div class="warper container-fluid ">

        <div class="page-header">
            <h1>Aplikasi Perpustakaan Online <small>Let's get a book...</small></h1>
        </div>


        <div class="row">

            <div class="col-lg-4">
                <div class="panel panel-default clearfix dashboard-stats rounded" style="cursor: pointer;" onclick="see();">

                    <a href="javascript:see();"><i class="fa fa-book bg-danger transit stats-icon"></i></a>
                    <h3 class="transit"><?php echo $yoah1 ?> Buku</h3>
                    <p class="text-muted transit">Lihat Buku</p>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="panel panel-default clearfix dashboard-stats rounded" style="cursor: pointer;" onclick="anggota();">
                    <a>
                        <i class="fa fa-user bg-success transit stats-icon"></i>
                    </a>
                    <h3 class="transit"><?php echo $yoah ?> Anggota</h3>
                    <p class="text-muted transit">Lihat Anggota</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-default clearfix dashboard-stats rounded" style="cursor: pointer;" onclick="peminjaman();">
                    <a>
                        <i class="fa fa-archive bg-warning transit stats-icon"></i>
                    </a>
                    <h3 class="transit"><?php echo $total_pinjam ?> Peminjaman</h3>
                    <p class="text-muted transit">Lihat Peminjaman</p>
                </div>
            </div>
        </div>
        <div class="row mt-5 bg-black" id="see">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading ">Data Buku</div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($data_news = mysql_fetch_array($exec)) {
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
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading ">Data Peminjaman</div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered" id="peminjaman">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Judul</th>
                                    <th>Peminjam</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomer = 0;
                                while ($dat = mysql_fetch_array($qry)) {
                                    $nomer++;
                                ?>
                                    <tr>
                                        <td><?= $nomer; ?></td>
                                        <td><img src="assets/buku/<?php echo $dat['gambar']; ?>" width="100px"></td>
                                        <td><?php echo $dat['judul']; ?></td>
                                        <td><?php echo $dat['nama'] ?></td>
                                        <td><?php echo $dat['tgl_pinjam'] ?></td>
                                        <td><?php if ($dat['status_peminjaman'] == "1") {
                                                echo "belum dikembalikan";
                                            } else {
                                                echo "sudah dikembalikan";
                                            } ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading ">Data Pengembalian</div>
                    <div class="panel-body">
                        <table class="table table-striped no-margn" id="pengembalian">
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
                                while ($kembali = mysql_fetch_array($pengembalian)) {
                                    $tgl_pinjam = $kembali['tgl_pinjam'];
                                    $username = $kembali['username'];
                                    $judul_buku = $kembali['judul'];
                                    $tgl_kembali = $kembali['tgl_kembali'];
                                    $denda = $kembali['denda'];
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
    </div>
</section>

</section>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });

    $(document).ready(function() {
        $('#peminjaman').DataTable();
    });

    $(document).ready(function() {
        $('#pengembalian').DataTable();
    });
    $('ul li a').click(function() {
        $('ul li.active').removeClass('active');
        $(this).closest('li').addClass('active');
    });

    $('.date-own').datepicker({
        minViewMode: 2,
        format: 'yyyy'
    });
</script>
<style>
    .ui-datepicker-calendar {
        display: none;
    }
</style>

</body>

</html>