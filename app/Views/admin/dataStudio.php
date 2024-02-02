<?php $session = session(); ?>

<?php  $this->extend('/admin/template'); //akan menggunakan file template di layout?>

<?php   $this->section('content'); ?>

<h2>Data Studio</h2>
<table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Studio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1; 
            foreach ($studio as $s) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td>Studio <?php echo $s['no_studio'] ?></td>
<<<<<<< HEAD
=======
                <?php $no++?>
>>>>>>> 0ee763d60493289d2bf65d747001e395c66ad623
                </tr>
                <?php $no++?>
            <?php endforeach; ?>
        </tbody>
    </table>




<?php  $this->endSection(); ?>
