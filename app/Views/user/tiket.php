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
    <title>Tiket</title>
    <style>
    html, body, div, h1, h2, p {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Arial', sans-serif;
        margin: 20px;
    }

    .container {
        border: 2px solid #007BFF;
        padding: 20px;
        max-width: 600px;
        margin: 0 auto;
    }

    h1 {
        font-size: 28px;
        color: #007BFF;
        margin-bottom: 20px;
    }

    h2 {
        font-size: 20px;
        color: #555;
        margin-bottom: 10px;
    }

    /* Style untuk bagian studio */
    h2#studio {
        color: #007BFF;
    }

    /* Style untuk format tanggal dan jam */
    h2.tanggal, h2.jam, h2.jam-selesai {
        color: #28A745;
    }

    /* Style untuk format nomor kursi */
    h2.no-kursi {
        color: #DC3545;
    }

    </style>
</head>
<body>
    <div class="container">
    <h1>Tiket Bioskop</h1>
     <?php 
        foreach ($film as $f): ?>
        <?php if ($f['id_film']==$transaksi['id_film']){ ?>
            <h2>Judul Film : <?php echo $f['nama_film']; ?> </h2>
        <?php } ?>
    <?php endforeach ?>

    <?php 
        foreach ($jadwal as $j): ?>
            <?php if ($transaksi['id_jadwal']==$j['id_jadwal']){ ?>
            <h2>Tanggal : <?php echo $j['tanggal_tayang']; ?> </h2>
        <?php } ?>
    <?php endforeach ?>

    <?php 
        foreach ($jadwal as $j): ?>
            <?php if ($transaksi['id_jadwal']==$j['id_jadwal']){ ?>
            <h2>Jam Mulai  : <?php echo $j['jam_tayang']; ?> </h2>
        <?php } ?>
    <?php endforeach ?>
    <?php 
        foreach ($jadwal as $j): ?>
            <?php if ($transaksi['id_jadwal']==$j['id_jadwal']){ ?>
            <h2>Jam Selesai  : <?php echo $j['jam_selesai']; ?> </h2>
        <?php } ?>
    <?php endforeach ?>
    <?php 
        foreach ($kursi as $j): ?>
            <?php if ($transaksi['id_kursi']==$j['id_kursi']){ ?>
            <h2>No Kursi  : <?php echo $j['no_kursi']; ?> </h2>
        <?php } ?>
    <?php endforeach ?>
   
    
    <h2>Studio : <?php echo $transaksi['id_studio'] ?></h2>
    </div>
</body>
</html>