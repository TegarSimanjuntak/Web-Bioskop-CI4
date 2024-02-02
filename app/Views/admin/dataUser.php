<?php $session = session(); ?>

<?php  $this->extend('/admin/template'); //akan menggunakan file template di layout?>

<?php   $this->section('content'); ?>

<h2>Data Pengguna</h2>
<table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Pengguna</th>
                <th>Username</th>
                <th>Email</th>
                <th>Umur</th>
                <th>No.Telepon</th>
                <th>Riwayat Transaksi</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1; 
            foreach ($pengguna as $p) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?php echo $p['nama_pengguna'] ?></td>
                    <td><?php echo $p['username'] ?></td>
                    <td><?php echo $p['email_pengguna'] ?></td>
                    <td><?php echo $p['umur_pengguna'] ?></td>
                    <td><?php echo $p['no_telepon'] ?></td>
                    <td><a href="/admin/riwayatTransaksi/<?php echo $p['id_pengguna'] ?>">Detail</a></td>
<<<<<<< HEAD
                    <?php $no++?>
=======
<?php $no++?>
>>>>>>> 0ee763d60493289d2bf65d747001e395c66ad623
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>




<?php  $this->endSection(); ?>
