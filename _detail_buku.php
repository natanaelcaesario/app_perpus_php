 <?php
    include "config/koneksi.php";
    $kode = $_GET['id'];
    $query = mysql_query("SELECT yo_buku.kd_penerbit,yo_buku.kd_pengarang,yo_buku.id_buku,yo_buku.judul,yo_buku.deskripsi,yo_buku.Isbn,yo_buku.jumlah,yo_buku.tahun_terbit, yo_buku.status,yo_buku.gambar,yo_pengarang.pengarang, yo_penerbit.penerbit FROM (yo_buku INNER JOIN yo_pengarang on yo_buku.kd_pengarang=yo_pengarang.kd_pengarang) INNER JOIN yo_penerbit on yo_buku.kd_penerbit=yo_penerbit.kd_penerbit where id_buku='$kode'");
    $tioo = mysql_fetch_array($query);
    $id = $tioo['id_buku'];
    $isbn = $tioo['Isbn'];
    $judul = $tioo['judul'];
    $tahun = $tioo['tahun_terbit'];
    $stok = $tioo['jumlah'];
    $deskripsi = $tioo['deskripsi'];
    $foto = $tioo['gambar'];
    $pengarang = $tioo['pengarang'];
    $penerbit = $tioo['penerbit'];
    $status = $tioo['status'];
    ?>
 <div class="col-lg-12">
     <div class="panel panel-<?= $stok < 1 ? 'danger' : 'success'; ?>">
         <div class="panel-heading"><a href="javascript:see();" style="color:white"><i class="fa fa-arrow-left"></i></a> Detail Buku - <?php echo $judul ?></div>
         <div class="panel-body">
             <div class="form-group">
                 <img src="assets/buku/<?php echo $foto ?>" width="200px">
             </div>
             <div class="form-group">
                 <label>Isbn</label>
                 <input type="text" class="form-control" value="<?php echo $isbn ?>" disabled>
             </div>
             <div class="form-group">
                 <label>Judul</label>
                 <input type="text" class="form-control" value="<?php echo $judul ?>" disabled>
             </div>
             <div class="form-group">
                 <label>Tahun Terbit</label>
                 <input type="text" class="form-control" value="<?php echo $tahun ?>" disabled>
             </div>
             <div class="form-group">
                 <label>Stock</label>
                 <input type="text" class="form-control" value="<?php echo $stok ?>" disabled>
             </div>
             <div class="form-group">
                 <label>Pengarang</label>
                 <input type="text" class="form-control" value="<?php echo $pengarang ?>" disabled>
             </div>
             <div class="form-group">
                 <label>Penerbit</label>
                 <input type="text" class="form-control" value="<?php echo $penerbit ?>" disabled>
             </div>
             <div class="form-group">
                 <label>Deskripsi</label>
                 <input type="text" class="form-control" value="<?php echo $deskripsi ?>" disabled>
             </div>
             <div class="form-group">
                 <span class="label <?= $stok < 1 ? 'label-danger' : 'label-success'; ?>"><?= $stok < 1 ? 'Tidak tersedia' : 'Tersedia'; ?></span>
             </div>
         </div>
     </div>
 </div>