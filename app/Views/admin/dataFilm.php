<?php $session = session(); ?>

<?php $this->extend('/admin/template'); //akan menggunakan file template di layout?>

<?php $this->section('content'); ?>
    <h2>Films</h2>
    <?php if(session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('pesan') ?>
        </div>
    <?php endif ?>
    <table >
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Film</th>
                <th>Gambar</th>
                <th>Tahun Rilis</th>
                <th>Deskripsi Film</th>
                <th>Trailer Film</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1; 
            foreach ($films as $film) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $film['nama_film']; ?></td>
                    <td><img src="../image/<?= $film['gambar']; ?>" alt="Film Image" class="film-image"></td>
                    <td><?= $film['tahun_rilis']; ?></td>
                    <td><?= $film['deskripsi_film']; ?></td>
                    <td><a href="<?= $film['trailer_film']; ?>" target="_blank" class="trailer-link">Trailer</a></td>
                    <td class="status-column">
                        <?php 
                            if ($film['status'] == 1) {
                                echo "Tersedia";
                            } else {
                                echo "Tidak Tersedia";
                            }
                            $no++;
                        ?>
                    </td>
                    <td><a href="/admin/edit/<?php echo $film['id_film']?>" class="edit-button">Ubah</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="/admin/create" class="add-button">Tambah Film</a>
<?php $this->endSection(); ?>
