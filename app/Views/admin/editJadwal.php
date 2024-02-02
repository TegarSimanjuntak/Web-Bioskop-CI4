<?php $session = session(); ?>

<?php  $this->extend('/admin/template'); //akan menggunakan file template di layout?>

<?php   $this->section('content'); ?>
<style>
    h2{
      text-align : center;
    }
  </style>
<h2>Tanggal Tayang : <?php echo $jadwal['tanggal_tayang'] ?></h2>
<div class="container_edit">
<form action="/admin/updateJadwal/<?php echo $jadwal['id_jadwal']; ?>" method="post">
 
    <label for="jam_tayang">Jam Tayang</label>
    <div>
      <input type="time"  id="jam_tayang" name="jam_tayang" value="<?php echo $jadwal['jam_tayang']; ?>">
    </div>
    <label for="jam_selesai">Jam Selesai</label>
    <div>
      <input type="time"  id="jam_selesai" name="jam_selesai" value="<?php echo $jadwal['jam_selesai']; ?>">
    </div>
    <label for="status">Status</label>
        <div>
            <select id="status" name="status">
                <option value="1" <?php echo ($jadwal['status'] == 1) ? 'selected' : ''; ?>>Aktif</option>
                <option value="0" <?php echo ($jadwal['status'] == 0) ? 'selected' : ''; ?>>Tidak Aktif</option>
            </select>
        </div>
  
 
  <button type="submit">Ubah Data</button>
  </div>
</form>

<?php  $this->endSection(); ?></html>
