 <?php
    include "config/koneksi.php";
    $query = mysql_query("SELECT * FROM yo_buku where jumlah > 1");
    $query2 = mysql_query("SELECT * FROM yo_anggota");
    ?>
 <div class="col-lg-12">
     <div class="panel panel-success">
         <div class="panel-heading"><a href="javascript:peminjaman();" style="color:white"><i class="fa fa-arrow-left"></i></a> Form Tambah Peminjaman</div>
         <form action="fungsi/+peminjaman.php" method="post" role="form" enctype="multipart/form-data">
             <div class="panel-body">
                 <div class="form-group">
                     <label>Buku</label>
                     <select name="id_buku" id="id_buku" class="form-control" required>
                         <option value="">Pilih Buku</option>
                         <?php while ($buku = mysql_fetch_array($query)) { ?>
                             <option value="<?= $buku['id_buku'] ?>"><?= $buku['judul']; ?></option>
                         <?php } ?>
                     </select>
                 </div>
                 <div class="form-group">
                     <label>Anggota</label>
                     <select name="id_anggota" id="id_anggota" class="form-control" required>
                         <option value="">Pilih Anggota</option>
                         <?php while ($anggota = mysql_fetch_array($query2)) { ?>
                             <option value="<?= $anggota['id_anggota'] ?>"><?= $anggota['nama']; ?></option>
                         <?php } ?>
                     </select>
                 </div>
                 <div class="form-group">
                     <label>Tanggal Peminjaman</label>
                     <input type="date" class="form-control" name="tgl_pinjam" required>
                 </div>
                 <div class="form-group">
                     <label>Deskripsi</label>
                     <input type="text" class="form-control" name="deskripsi" required>
                 </div>

                 <div class="form-group">
                     <button class="btn btn-primary" name="tambahpinjam">Tambah Peminjaman</button>
                 </div>
             </div>
         </form>
     </div>
 </div>