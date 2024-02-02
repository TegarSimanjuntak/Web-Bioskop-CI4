<?php



 $session = session(); ?>

<?php  $this->extend('/admin/template'); // akan menggunakan file template di layout ?>

<?php $this->section('content'); ?>

<?php if(session()->getFlashdata('pesan')): ?>
          <div class="alert alert-success">
            <?php echo session()->getFlashdata('pesan') ?>
          </div>
          <?php endif ?>
<?php foreach ($film as $f) :?>
    <h1><?= $f['nama_film'] ?></h1>

    <?php 
    // Filter jadwal hanya untuk film yang sedang diproses
    $jadwalFilm = array_filter($jadwal, function($jadwalItem) use ($f) {
        return $jadwalItem['id_film'] == $f['id_film'];
    });

    // Ambil tanggal-tanggal unik
    $jadwalUnik = array_unique(array_column($jadwalFilm, 'tanggal_tayang'));
    ?>

    <?php foreach ($jadwalUnik as $tanggal_tayang): ?>
        <h2><?= date('d F Y', strtotime($tanggal_tayang)) ?></h2>
        <div id="pilihan_jadwal">
        <table border="1">
            <tr>
                <th>Jam Mulai</th>
                <th>Status</th>
                <th>Kursi Tersedia</th>
                <th>Aksi</th>
            </tr>
       

            <?php foreach ($jadwalFilm as $jadwalItem): ?>
                <tr>
                <?php if ($jadwalItem['tanggal_tayang'] == $tanggal_tayang): ?>
                    <?php // Ubah format waktu sesuai kebutuhan
                    $jam_tayang = date('H:i', strtotime($jadwalItem['jam_tayang']));
                    ?>
                    <td><?= $jam_tayang ?></td>
                    <td><?php if ($jadwalItem['status']==1) {
                        echo "Tersedia";
                    }
                    else{echo "Tidak Tersedia";}; ?></td>
    
                <td><a href="/admin/dataKursi/<?php echo $jadwalItem['id_jadwal']; ?>">Detail</a></td>
                <td><a href="/admin/editJadwal/<?php echo $jadwalItem['id_jadwal']; ?>">Edit</a></td>
                <?php endif; ?>
                </tr>
                
            <?php endforeach; ?>
        </table>

        </div>
    <?php endforeach; ?>
<?php endforeach; ?>

<a href="/admin/tambahJadwal" class="add-button">Tambah Jadwal</a>


<?php $this->endSection(); ?>
