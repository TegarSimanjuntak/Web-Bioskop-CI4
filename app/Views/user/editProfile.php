<?php 
$session = session();
if(!$session->get('login')){
    header("Location: /login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/editProfile.css">
    <title>edit Profile</title>
    <style>

    </style>
</head>
<a href="/user/profil/<?php echo session()->get('id_pengguna'); ?>" class="button">Kembali ke Profil</a>
<body>
    <nav>
    </nav>
    <div class="container">
        <h2>Edit Profile</h2>
        <?php if(session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <form action="/user/updateProfile" method="post" enctype="multipart/form-data">

                <label for="gambar" >Gambar</label>
            <div>
            <input type="hidden" name="gambar_sebelumnya" value="<?php echo $pengguna['gambar_profil']; ?>">
            <input type="file" id="gambar_profil" name="gambar_profil" value="<?php echo $pengguna['gambar_profil']; ?>">
            </div>
            <div class="data_diri">
                <h2>Data Diri</h2>
                <p>Nama Lengkap: <input type="text" name="nama_pengguna" value="<?= $pengguna['nama_pengguna'] ?>" /></p>
                <p>Umur: <input type="number" name="umur_pengguna" value="<?= $pengguna['umur_pengguna'] ?>" /></p>
                <p>No Telepon: <input type="tel" name="no_telepon" value="<?= $pengguna['no_telepon'] ?>" /></p>
                <p>email: <input type="text" name="email_pengguna" value="<?= $pengguna['email_pengguna'] ?>" /></p>
            </div>
            <input type="submit" value="Simpan">
        </form>
    </div>
</body>
</html>
