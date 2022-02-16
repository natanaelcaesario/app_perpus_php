 <?php
  include "config/koneksi.php";
  $kode = $_GET['id'];
  $query = mysql_query("SELECT yo_anggota.nama,yo_anggota.username,yo_anggota.password,yo_anggota.alamat,yo_anggota.email,yo_anggota.no_telp,yo_anggota.photo
FROM yo_anggota INNER JOIN yo_peminjaman on yo_anggota.id_anggota=yo_peminjaman.id_anggota where yo_peminjaman.id_buku='$kode'");
  $tioo = mysql_fetch_array($query);
  $nama = $tioo['nama'];
  $alamat = $tioo['alamat'];
  $email = $tioo['email'];
  $no_telp = $tioo['no_telp'];
  $username = $tioo['username'];
  $password = $tioo['password'];
  $foto = $tioo['photo'];
  ?>
 <div class="col-md-8">
   <div class="panel panel-primary">
     <div class="panel-heading"><a href="javascript:peminjaman();" style="color:white"><i class="fa fa-arrow-left"></i></a> Peminjam - <?php echo $nama ?></div>
     <div class="panel-body">
       <div class="form-group">
         <img src="assets/pp/<?php echo $foto ?>" width="200px">
       </div>
       <div class="form-group">
         <label>Nama</label>
         <input type="text" class="form-control" value="<?php echo $nama ?>" disabled>
       </div>
       <div class="form-group">
         <label>Username</label>
         <input type="text" class="form-control" value="<?php echo $username ?>" disabled>
       </div>
       <div class="form-group">
         <label>Password</label>
         <input type="text" class="form-control" value="<?php echo $password ?>" disabled>
       </div>
       <div class="form-group">
         <label>Alamat</label>
         <input type="text" class="form-control" value="<?php echo $alamat ?>" disabled>
       </div>
       <div class="form-group">
         <label>Email</label>
         <input type="text" class="form-control" value="<?php echo $email ?>" disabled>
       </div>
       <div class="form-group">
         <label>No_Telp</label>
         <input type="text" class="form-control" value="<?php echo $no_telp ?>" disabled>
       </div>
     </div>
   </div>
 </div>