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
    <link rel="stylesheet" href="/css/pilihKursi.css">
    <title>Pilih Kursi</title>
    <style>
        .penuh {
            background-color: red; 
            color: white; 
        }
    </style>
</head>
<body>
    <div class="tampilan_kiri">
        <h1><?php echo $film['nama_film'] ?></h1>
        <h2>Studio <?php echo $jadwal['id_studio'] ?></h2>
        <a href="/">Beranda</a>
        </div>
    <div class="tampilan_kanan">
        <h2><?php echo $jadwal['tanggal_tayang'] ?></h2>
        <h2><?php echo $jadwal['jam_tayang'] ?> - <?php echo $jadwal['jam_selesai'] ?></h2>
    </div>
    <div class="layar"><h1>Layar</h1></div>
    <form id="pesan" action="/pesan" method="post">
        <div class="kursi">
            <div class="kursi_kiri">
                <?php 
                $counter = 0;
            
                foreach ($kursi as $k):
                    $counter++;
                ?>

                <?php foreach ($transaksi as $t): ?>
                    <?php if (($t['id_studio'] == $jadwal['id_studio']) && ($t['id_film'] == $film['id_film']) && ($t['id_jadwal'] == $jadwal['id_jadwal']) && ($t['id_kursi'] == $k['id_kursi'])): ?>
                        <button id="<?php echo $k['id_kursi']; ?>" type="button" class="penuh" onclick="selectSeat('<?php echo $k['id_kursi']; ?>')" disabled>
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
                        <button id="<?php echo $k['id_kursi']; ?>" type="button" class="penuh" onclick="selectSeat('<?php echo $k['id_kursi']; ?>')" disabled>
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
    </form>
    <footer>
        <h1>CREDITS DOA IBU 2023</h1>
    </footer>

    <script>
        function selectSeat(idKursi) {
            var button = document.getElementById(idKursi);


            if (button.classList.contains('penuh')) {
                button.disabled = true;
            } else {
                
                document.getElementById('selected_seat').value = idKursi;

                document.getElementById('pesan').submit();
            }
        }
    </script>
</body>
</html>
