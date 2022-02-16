<?php
include "config/koneksi.php";

$kode = $_GET['id'];
$query = mysql_query("SELECT yo_buku.kd_penerbit,yo_buku.kd_pengarang,yo_buku.id_buku,yo_buku.judul,yo_buku.deskripsi,yo_buku.Isbn,yo_buku.jumlah,yo_buku.tahun_terbit, yo_buku.status,yo_buku.gambar,yo_pengarang.pengarang, yo_penerbit.penerbit
FROM (yo_buku INNER JOIN yo_pengarang on yo_buku.kd_pengarang=yo_pengarang.kd_pengarang)
INNER JOIN yo_penerbit on yo_buku.kd_penerbit=yo_penerbit.kd_penerbit where id_buku='$kode'");
$tioo = mysql_fetch_array($query);
$id = $tioo['id_buku'];
$isbn = $tioo['Isbn'];
$judul = $tioo['judul'];
$tahun = $tioo['tahun_terbit'];
$jumlah = $tioo['jumlah'];
$deskripsi = $tioo['deskripsi'];
$foto = $tioo['gambar'];
$kd1 = $tioo['kd_pengarang'];
$kd2 = $tioo['kd_penerbit'];

// pengarang
$query_pengarang = "SELECT * FROM yo_pengarang ";
$pengarang = mysql_query($query_pengarang);
$options = "";


//  penerbit
$query_penerbit = "SELECT * FROM yo_penerbit ";
$penerbit = mysql_query($query_penerbit);
?>
<div class="col-lg-12">
  <div class="panel panel-primary">
    <div class="panel-heading"><a href="javascript:see();" style="color:white"><i class="fa fa-arrow-left"></i></a> Edit Buku-<?php echo $judul ?></div>
    <div class="panel-body">

      <form action="fungsi/+edit.php" method="POST" class="form-horizontal" role="form">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Judul</label>
          <div class="col-sm-9">
            <input type="text" name="judul" class="form-control" value="<?php echo $judul ?>">
            <input type="hidden" name="id" class="form-control" value="<?php echo $id ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label">Isbn</label>
          <div class="col-sm-9">
            <input type="text" name="Isbn" class="form-control" id="inputPassword3" value="<?php echo $isbn ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Tahun</label>
          <div class="col-sm-9">
            <select name="tahun" id="tahun" class="form-control" required>
              <?php $years = range(1995, strftime("%Y", time())); ?>
              <option>Pilih Tahun</option>
              <?php foreach ($years as $year) : ?>
                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Jumlah</label>
          <div class="col-sm-9">
            <input type="text" name="jumlah" class="form-control" value="<?php echo $jumlah ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Pengarang</label>
          <div class="col-sm-9">
            <select name="pengarang" id="pengarang" class="form-control">
              <?php while ($pengarang_hasil = mysql_fetch_array($pengarang)) { ?>
                <option value="<?php echo $pengarang_hasil['kd_pengarang']; ?>"> <?= $pengarang_hasil['kd_pengarang']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Pengarang</label>
          <div class="col-sm-9">
            <select name="penerbit" class="form-control">
              <?php while ($penerbit_hasil = mysql_fetch_array($penerbit)) { ?>
                <option value="<?php echo $penerbit_hasil['kd_penerbit']; ?>"> <?php echo $penerbit_hasil['penerbit']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label">Deskripsi</label>
          <div class="col-sm-9">
            <textarea type="text" name="deskripsi" class="form-control"><?php echo $deskripsi ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label">Gambar</label>
          <div class="col-sm-9">
            <img src="assets/buku/<?php echo $foto ?>" width="100px">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-danger btn-xs">Simpan</button>
          </div>
        </div>
      </form>
      <div id="editio">
      </div>
    </div>
  </div>
</div>