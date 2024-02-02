<?php 
$session = session();
?>

<?php
$jadwalUnik = array_unique(array_column($jadwal, 'tanggal_tayang'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/prebooking.css">
    <title>Preebooking</title>
</head>
<body>
<div class="isi_body">
    <nav>
        <div class="ikon-person-container">
            <div class="lingkaran"></div>
            <img src="../image/ikon_person.png" class="ikon_person">
            
        </div>
        <h1 class="DoaIbuAtas"><a href="#">Doa Ibu</a></h1>
        <label class="switch">
            <div class="tema">
                <input type="checkbox" id="themeToggle" onchange="toggleTheme()">
                <span class="slider round"></span>
                <h2 class="TulisanGelap">Tema Gelap</h2>
            </div>
        </label>
        <input type="text" class="pencarian" id="searchInput" placeholder="Cari...">
        <h2 class="beranda"><a href="/">Beranda</a></h2>
        <h2 class="contact"><a href="#">Contact</a></h2>
    </nav>
    <div class="header">
        <img src="/image/<?php echo $film['gambar'];?>" class="header_gambar">
        <h1 class="judulFilmHeader"><?php echo $film['nama_film'];?></h1>
        <h3 class="informasi_film"><?php echo $film['deskripsi_film'];?></h3>
        <img src="/image/<?php echo $film['gambar'];?>" class="gambar_kecil">
        
        <a href="<?php echo $film['trailer_film']; ?>" class="ikon_play">
            <img src="/image/ikon_play.png" alt="Play">
        </a>
        <h1 class="tulisan_trailer">Trailer</h1>
    </div>
    <div class="jadwal_jadwal">
    <h1>JADWAL</h1>
    <br>

    <?php foreach ($jadwalUnik as $tanggal_tayang): ?>

    <h2><?= date('d F Y', strtotime($tanggal_tayang)) ?></h2>
    <div id="pilihan_jadwal">
        <?php
            foreach ($jadwal as $jadwalItem) {
                if ($jadwalItem['tanggal_tayang'] == $tanggal_tayang) {
                    // Ubah format waktu sesuai kebutuhan
                    $jam_tayang = date('H:i', strtotime($jadwalItem['jam_tayang']));
                    if ($jadwalItem['id_film']==$film['id_film']):?>
                    <?php echo ($jadwalItem['id_jadwal']);   ?>
                    <button class="jadwalButton"><a href="/jumlahKursi/<?php echo ($jadwalItem['id_jadwal']);   ?>"><?= $jam_tayang ?></a></button>
                     <?php endif ?>
                    <?php
                }
            }
        ?>
    </div>
    <?php endforeach; ?>
 </div>
    <footer>
        <h1>CREDITS DOA IBU 2023</h1>
    </footer>
    </div>
    <script>

    function toggleTheme() {
        const body = document.body;
        const themeToggle = document.getElementById('themeToggle');
        const isDarkTheme = body.classList.contains('dark-theme');

        if (isDarkTheme) {
            body.classList.remove('dark-theme');
            themeToggle.checked = false;
        } else {
            body.classList.add('dark-theme');
            themeToggle.checked = true;
        }
    }

    window.addEventListener('load', () => {
        
        const body = document.body;

        if (prefersDarkMode) {
            body.classList.add('dark-theme');
            document.getElementById('themeToggle').checked = true;
        }
    });
</script>
</body>
</html>