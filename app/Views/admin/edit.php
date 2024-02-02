<?php $session = session(); ?>

<?php  $this->extend('/admin/template'); //akan menggunakan file template di layout?>

<?php   $this->section('content'); ?>

  <style>
    h2{
      text-align : center;
    }
  </style>
  
    <h2>Ubah Film</h2>
    <div class="container_edit">
    <form action="/admin/update/<?php echo $film['id_film']; ?>" method="post" enctype="multipart/form-data">
 
    <label for="nama_film">Nama Film</label>
    <div>
      <input type="text"  id="nama_film" name="nama_film" value="<?php echo $film['nama_film']; ?>">
    </div>
  
    <label for="gambar" >Gambar</label>
    <div>
    <input type="hidden" name="gambar_sebelumnya" value="<?php echo $film['gambar']; ?>">
      <input type="file" id="gambar" name="gambar" value="<?php echo $film['gambar']; ?>">
    </div>
  

    <label for="tahun_rilis" >Tahun Rilis</label>
    <div>
      <input type="text" id="tahun_rilis" name="tahun_rilis"value="<?php echo $film['tahun_rilis']; ?>">
    </div>
  

    <label for="deskripsi_film" >Deskripsi Film</label>
    <div>
      <input type="area" id="deskripsi_film" name="deskripsi_film"value="<?php echo $film['deskripsi_film']; ?>">
    </div>

    <label for="trailer_film" >Trailer Film</label>
    <div>
      <input type="text" id="trailer_film" name="trailer_film"value="<?php echo $film['trailer_film']; ?>">
    </div>
    <label for="status">Status</label>
        <div>
            <select id="status" name="status">
                <option value="1" <?php echo ($film['status'] == 1) ? 'selected' : ''; ?>>Aktif</option>
                <option value="0" <?php echo ($film['status'] == 0) ? 'selected' : ''; ?>>Tidak Aktif</option>
            </select>
        </div>
  
    <br>
    <br>
  <button type="submit">Ubah Data</button>
</form>
</div>
<<<<<<< HEAD
<?php  $this->endSection(); ?></html>
=======
<?php  $this->endSection(); ?></html>
>>>>>>> 0ee763d60493289d2bf65d747001e395c66ad623
