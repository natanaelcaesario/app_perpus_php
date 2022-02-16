 <?php
    include "config/koneksi.php";
    $query = mysql_query("SELECT * FROM yo_pengarang");
    $query2 = mysql_query("SELECT * FROM yo_penerbit");
    ?>
 <div class="col-lg-12">
     <div class="panel panel-success">
         <div class="panel-heading"><a href="javascript:see();" style="color:white"><i class="fa fa-arrow-left"></i></a> Form Tambah Buku</div>
         <form action="fungsi/+buku.php" method="post" role="form" enctype="multipart/form-data">
             <div class="panel-body">
                 <div class="form-group">
                     <label>Isbn</label>
                     <input type="number" class="form-control" name="isbn" required>
                 </div>
                 <div class="form-group">
                     <label>Judul</label>
                     <input type="text" class="form-control" name="judul" required>
                 </div>
                 <div class="form-group">
                     <label>Stock</label>
                     <input type="number" class="form-control" name="jumlah" min="1" required>
                 </div>
                 <div class="form-group">
                     <label>Deskripsi</label>
                     <input type="text" class="form-control" name="deskripsi" required>
                 </div>
                 <div class="form-group">
                     <label>Tahun Terbit</label>
                     <select name="tahun_terbit" id="tahun_terbit" class="form-control" required>
                         <?php $years = range(1995, strftime("%Y", time())); ?>
                         <option>Pilih Tahun</option>
                         <?php foreach ($years as $year) : ?>
                             <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>
                 <div class="form-group">
                     <label>Pengarang</label>
                     <select name="kd_pengarang" id="kd_pengarang" class="form-control" required>
                         <option value="">Pilih pengarang</option>
                         <?php while ($pengarang = mysql_fetch_array($query)) { ?>
                             <option value="<?= $pengarang['kd_pengarang'] ?>"><?= $pengarang['pengarang']; ?></option>
                         <?php } ?>
                     </select>
                 </div>
                 <div class="form-group">
                     <label>Penerbit</label>
                     <select name="kd_penerbit" id="kd_penerbit" class="form-control" required>
                         <option value="">Pilih penerbit</option>
                         <?php while ($penerbit = mysql_fetch_array($query2)) { ?>
                             <option value="<?= $penerbit['kd_penerbit'] ?>"><?= $penerbit['penerbit']; ?></option>
                         <?php } ?>
                     </select>
                 </div>
                 <div class="form-group" hidden>
                     <label>Status</label>
                     <select name="status" id="status" class="form-control" hidden>
                         <option value="Tersedia">Tersedia</option>
                     </select>
                 </div>
                 <div class=" form-group">
                     <label>Gambar Buku</label>
                     <input type="file" class="form-control" name="gambar" required>
                 </div>
                 <div class="form-group">
                     <button class="btn btn-primary" name="tambahbuku">Tambah Buku</button>
                 </div>
             </div>
         </form>
     </div>
 </div>