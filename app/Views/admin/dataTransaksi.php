<?php $session = session(); ?>

<?php  $this->extend('/admin/template'); //akan menggunakan file template di layout?>

<?php   $this->section('content'); ?>




<?php if (!empty($transaksi)) : ?>
                <table border="solid">
                    <tr>
                        <th>Judul Film</th>
                        <th>Tanggal Tayang</th>
                        <th>Jam Tayang</th>
                        <th>Kursi</th>
                        <th>Tiket</th>
                    </tr>
                    <?php $total = 0; ?>
                    <?php foreach ($transaksi as $t) : ?>
                        <?php $total++; ?>
                        <tr>
                            <?php foreach ($film as $f) : ?>
                                <?php if ($t['id_film'] == $f['id_film']) : ?>
                                    <td><?php echo $f['nama_film']; ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php foreach ($jadwal as $j) : ?>
                                <?php if ($t['id_jadwal'] == $j['id_jadwal']) : ?>
                                    <td><?php echo $j['tanggal_tayang']; ?></td>
                                    <td><?php echo $j['jam_tayang']; ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php foreach ($kursi as $k) : ?>
                                <?php if ($t['id_kursi'] == $k['id_kursi']) : ?>
                                    <td><?php echo $k['no_kursi']; ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <td><a href="/tiket/<?php echo $t['id_transaksi'] ?>">tiket</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <table border="solid">
                    <tr>
                        <th>Judul Film</th>
                        <th>Tanggal Tayang</th>
                        <th>Jam Tayang</th>
                        <th>Kursi</th>
                        <th>Tiket</th>
                    </tr>
                    <tr>
                        <td colspan="5">No transactions found</td>
                    </tr>
                </table>
                <?php $total = 0; ?>
            <?php endif; ?>

            <p>Jumlah Pembelian Tiket: <?php echo $total ?></p>

<?php  $this->endSection(); ?>