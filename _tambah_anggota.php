 <div class="col-lg-12">
     <div class="panel panel-success">
         <div class="panel-heading"><a href="javascript:anggota();" style="color:white"><i class="fa fa-arrow-left"></i></a> Form Tambah Anggota</div>
         <form action="fungsi/+anggota.php" method="post" role="form" enctype="multipart/form-data">
             <div class="panel-body">
                 <div class="form-group">
                     <label>Nama</label>
                     <input type="text" class="form-control" name="nama">
                 </div>
                 <div class="form-group">
                     <label>Username</label>
                     <input type="text" class="form-control" name="username">
                 </div>
                 <div class="form-group">
                     <label>Alamat</label>
                     <input type="text" class="form-control" name="alamat">
                 </div>
                 <div class="form-group">
                     <label>Email</label>
                     <input type="email" class="form-control" name="email">
                 </div>
                 <div class="form-group">
                     <label>Nomer Telepon</label>
                     <input type="tel" class="form-control" name="no_telp">
                 </div>
                 <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" name="password">
                 </div>
                 <div class="form-group">
                     <label>Foto</label>
                     <input type="file" class="form-control" name="photo">
                 </div>
                 <div class="form-group">
                     <button class="btn btn-primary" name="tambahanggota">Tambah Buku</button>
                 </div>
             </div>
         </form>
     </div>
 </div>