<?php
include "config/koneksi.php";

$kode = $_GET['id'];
$query = mysql_query("SELECT * from yo_anggota where id_anggota = '$kode'");
$data = mysql_fetch_array($query);
?>
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><a href="javascript:anggota();" style="color:white"><i class="fa fa-arrow-left"></i></a> Edit Anggota</div>
        <div class="panel-body">

            <form action="fungsi/+editanggota.php" method="post" role="form" enctype="multipart/form-data">
                <div class="panel-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" value="<?= $data['id_anggota'] ?>" hidden name="id_anggota">
                        <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="<?= $data['username']; ?>" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $data['alamat']; ?>" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Nomer Telepon</label>
                        <input type="tel" class="form-control" name="no_telp" value="<?= $data['no_telp'] ?>" placeholder="Nomer Telepon">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?= $data['password'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select type="text" class="form-control" name="level" placeholder="Level">
                            <option value="<?= $data['level'] ?>"><?= $data['level']; ?></option>
                            <option value="user">user</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="tambahanggota">Edit Data</button>
                    </div>
                </div>
            </form>
            <div id="editio">
            </div>
        </div>
    </div>
</div>