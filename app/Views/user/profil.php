<?php
$session = session();
if (!$session->get('login')) {
    header("Location: /login");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/profile.css">
    <title>Profile</title>
</head>

<body>
    <nav>
        <div class="beranda">
            <a href="/">Beranda</a>
        </div>
        <a href="/editProfile/<?php echo $pengguna['id_pengguna'] ?>" class="button">Edit Profil</a>
    </nav>
    <div class="container">
        <div class="container_kiri">
            <div class="image">
            <img src="/image/<?php echo $pengguna['gambar_profil'] ?>" alt="Profile Image">
            </div>
        </div>
        <div class="container_kanan">
            <div class="data_diri">
                <h2>Data Diri</h2>

                <?php if ($pengguna) : ?>
                    <h2>Data Pengguna</h2>
                    <p>Nama Lengkap: <?php echo $pengguna['nama_pengguna'] ?></p>
                    <p>Umur: <?php echo $pengguna['umur_pengguna'] ?></p>
                    <p>Username: <?php echo $pengguna['username'] ?></p>
                    <p>No Telepon: <?php echo $pengguna['no_telepon'] ?></p>
                <?php else : ?>
                    <p>Data pengguna tidak ditemukan.</p>
                <?php endif; ?>

                <?php if (!empty($transaksi)) : ?>
                    <table border="solid">
                        <tr>
                            <th>Judul Film</th>
                            <th>Tanggal Tayang</th>
                            <th>Jam Tayang</th>
                            <th>Kursi</th>
                            <th>Tiket</th>
                            <th>Bayar</th>
                            <th>delete</th>
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
                                <td>
                                <a href="/payment/<?php echo $t['id_transaksi'] ?>">Bayar</a>
                                </td>
                                <td><a href="/profil/deleteTransaction/<?php echo $t['id_transaksi'] ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
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
                            <th>Bayar</th>
                        </tr>
                        <tr>
                            <td colspan="5">No transactions found</td>
                        </tr>
                    </table>
                    <?php $total = 0; ?>
                <?php endif; ?>
                <p>Jumlah Pembelian Tiket: <?php echo $total ?></p>
            </div>
        </div>
    </div>
</body>

</html>