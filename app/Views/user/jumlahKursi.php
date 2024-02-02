<?php 
$session = session();
if(!$session->get('login')){
    header("Location: /login");
    exit();
}
?>
 <?php 
            $counter = 0;
        
            foreach ($kursi as $k):
                $counter++;
            ?>

            <?php foreach ($transaksi as $t): ?>
                <?php if (($t['id_studio'] == $jadwal['id_studio']) && ($t['id_film'] == $film['id_film']) && ($t['id_jadwal'] == $jadwal['id_jadwal']) && ($t['id_kursi'] == $k['id_kursi'])): ?>
                    <?php $counter--; ?>

                <?php endif; ?>
            <?php endforeach; ?>            
            <?php 
            endforeach 
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/jumlahKursi.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="/">Beranda</a>
    </nav>
<div class="container">
    <form id="formPilihKursi" action="/pilihKursi" method="post">
        <div class="konten_pop_up">
            <h1><?php echo $film['nama_film'] ?></h1>
            <div class="Available_seats">
                <span>Available Seats : <?php echo $counter ?> </span><span> || </span><span>Studio <?php echo $jadwal['id_studio'] ?></span>
            </div>

            <input type="hidden" id="hidden_jumlah_kursi" name="hidden_jumlah_kursi" value="1">
            <input type="hidden" id="id_jadwal" name="id_jadwal" value="<?php echo $jadwal['id_jadwal'] ?>" >
            <input type="submit" value="Pesan">
        </div>
    </form>
</div>


</body>
</html>
