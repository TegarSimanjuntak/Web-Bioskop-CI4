<?php $session = session(); ?>

<?php  $this->extend('/admin/template'); //akan menggunakan file template di layout?>

<?php   $this->section('content'); ?>
<style>
    h2{
      text-align : center;
    }
  </style>
<form action="/admin/SaveJadwal" method="post">
<div class="container_edit">
<label for="id_film">Film</label>
        <div>
            <select id="id_film" name="id_film">
                <?php foreach ($film as $f) : ?>
                  
                <option value="<?php echo $f['id_film'] ?>">  <?php echo $f['nama_film'] ?></option>
                <?php endforeach ?>
                
            </select>
        </div>
<label for="tanggal_tayang">Tanggal Tayang</label>
    <div>
      <input type="date"  id="tanggal_tayang" name="tanggal_tayang">
    </div>
    <label for="jam_tayang">Jam Tayang</label>
    <div>
      <input type="time"  id="jam_tayang" name="jam_tayang">
    </div>
    <label for="jam_selesai">Jam Selesai</label>
    <div>
      <input type="time"  id="jam_selesai" name="jam_selesai">
    </div>
    <label for="status">Status</label>
        <div>
            <select id="status" name="status">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </div>
        <label for="id_studio">Studio</label>
        <div>
            <select id="id_studio" name="id_studio">
                <?php foreach ($studio as $s) : ?>
                  
                <option value="<?php echo $s['id_studio'] ?>">  <?php echo $s['no_studio'] ?></option>
                <?php endforeach ?>
                
            </select>
        </div>   
  
  <button type="submit">Tambah Jadwal</button>

</form>
</div>
<<<<<<< HEAD
<?php  $this->endSection(); ?></html>
=======
<?php  $this->endSection(); ?></html>
>>>>>>> 0ee763d60493289d2bf65d747001e395c66ad623
