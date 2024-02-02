<?php 
$session = session();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/dataKursi.css">
    <title>Pilih Kursi</title>
    <style>
        
        .penuh {
            background-color: red; 
            color: white; 
        }
    </style>
</head>
<body>
<nav>
        <a href="/admin/dataFilm">Data Film</a>
        <a href="/admin/dataStudio">Data Studio</a>
        <a href="/admin/dataJadwal">Data Jadwal</a>
        <a href="/admin/dataUser">Data User</a>
    </nav>
    <div class="tampilan_kiri">
        <h1><?php echo $film['nama_film'] ?></h1>
        <h2>Studio <?php echo $jadwal['id_studio'] ?></h2>

        </div>
    <div class="tampilan_kanan">
        <h2><?php echo $jadwal['tanggal_tayang'] ?></h2>
        <h2><?php echo $jadwal['jam_tayang'] ?> - <?php echo $jadwal['jam_selesai'] ?></h2>
    </div>
    <div class="layar"><h1>Layar</h1></div>
   
        <div class="kursi">
            <div class="kursi_kiri">
                <?php 
                $counter = 0;
            
                foreach ($kursi as $k):
                    $counter++;
                ?>

                <?php foreach ($transaksi as $t): ?>
                    <?php if (($t['id_studio'] == $jadwal['id_studio']) && ($t['id_film'] == $film['id_film']) && ($t['id_jadwal'] == $jadwal['id_jadwal']) && ($t['id_kursi'] == $k['id_kursi'])): ?>
                        <button class="penuh"  disabled>
                            <?php echo $k['no_kursi']; $penuh=1; continue 2;?>
                        </button>
                    <?php endif; ?>
                <?php endforeach; ?>

                <button >
                    <?php echo $k['no_kursi']; ?>
                </button>


                    <?php 
                    // Cetak tag <br> setiap lima perulangan
                    if ($counter % 5 === 0):
                    ?>
                        <br>
                    <?php 
                    endif;
                    if ($counter % 50 === 0){
                        break;
                    };
                endforeach 
                ?>
            </div>
            <div class="kursi_kanan">
                <?php 
                $startFromId = 51; // Mulai dari id=51
                $counter = 0;

                foreach ($kursi as $k):
                    if ($k['id_kursi'] >= $startFromId):
                        $counter++;
                ?>

                    <?php foreach ($transaksi as $t): ?>
                    <?php if (($t['id_studio'] == $jadwal['id_studio']) && ($t['id_film'] == $film['id_film']) && ($t['id_jadwal'] == $jadwal['id_jadwal']) && ($t['id_kursi'] == $k['id_kursi'])): ?>
                        <button id="<?php echo $k['id_kursi']; ?>" type="button" class="penuh" onclick="selectSeat('<?php echo $k['id_kursi']; ?>')" >
                            <?php echo $k['no_kursi']; $penuh=1; continue 2;?>
                        </button>
                    <?php endif; ?>
                    <?php endforeach; ?>

                        <button id="<?php echo $k['id_kursi']; ?>" type="button" onclick="selectSeat('<?php echo $k['id_kursi']; ?>')">
                            <?php echo $k['no_kursi']; ?>
                        </button>
                        <?php 
                        // Cetak tag <br> setiap lima perulangan
                        if ($counter % 5 === 0):
                        ?>
                            <br>
                        <?php 
                        endif;
                        if ($counter % 50 === 0){
                            break;
                        }
                    endif;
                endforeach 
                ?>
            </div>
        </div>
        <input type="hidden" id="id_jadwal" name="id_jadwal" value="<?php echo $jadwal['id_jadwal'] ?>" >
        <input type="hidden" id="id_film" name="id_film" value="<?php echo $film['id_film'] ?>" >
        <input type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $value = $session->get('id_pengguna'); ?>" >
        <input type="hidden" name="selected_seat" id="selected_seat" value="">

</body>
</html>
