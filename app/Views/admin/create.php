<?php $session = session(); ?>

<?php $session = session(); ?>

<?php  $this->extend('/admin/template'); //akan menggunakan file template di layout?>

<?php   $this->section('content'); ?>

    <h2>Tambah Film</h2>
    <form action="/admin/saveFilm" method="post" enctype="multipart/form-data">

    <label for="nama_film" >Nama Film</label>
    <div>
      <input type="text" id="nama_film" name="nama_film">
    </div>
  

    <label for="gambar" >Gambar</label>
    <div>
      <input type="file" id="gambar" name="gambar">
    </div>
  

    <label for="tahun_rilis" >Tahun Rilis</label>
    <div>
      <input type="text" id="tahun_rilis" name="tahun_rilis">
    </div>
  

    <label for="deskripsi_film">Deskripsi Film</label>
<div>
    <!-- Menggunakan textarea untuk memungkinkan input yang lebih panjang -->
    <textarea id="deskripsi_film" name="deskripsi_film"></textarea>
</div>

    <label for="trailer_film" >Trailer Film</label>
    <div>
      <input type="text" id="trailer_film" name="trailer_film">
    </div>
  
 
  <button type="submit">Tambah Data</button>
</form>


<?php  $this->endSection(); ?></html>