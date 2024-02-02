<?php
$session = session();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/beranda.css">
    <title>Beranda</title>
</head>

<body>
    <nav>
        <a href="/profil/<?php echo $value = $session->get('id_pengguna'); ?>">
            <div class="ikon-person-container">
                <div class="lingkaran"></div>
                <img src="image/ikon_person.png" class="ikon_person">

            </div>
        </a>
        <h1 class="DoaIbuAtas"><a href="/">Doa Ibu</a></h1>
        <label class="switch">
            <div class="tema">
                <input type="checkbox" id="themeToggle" onchange="toggleTheme()">
                <span class="slider round"></span>
                <h2 class="TulisanGelap">Tema Gelap</h2>
            </div>
        </label>
        
        <form action="/user/search" method="post">
        <input type="text" class="pencarian" id="searchInput" placeholder="Cari..." name="keyword">
        <button type="submit" name="submit">Cari</button>
        </form>
       


        <h2 class="beranda"><a href="/">Beranda</a></h2>
        <h2 class="contact"><a href="javascript:void(0);" onclick="showContactPopup()">Contact</a></h2>
        <?php
        if ($session->get('login')) {
            echo '<h2 class="login"><a href="/logout">Logout</a></h2>';
        } else {
            echo '<h2 class="login"><a href="/login">Login</a></h2>';
        }
        ?>
    </nav>
    <h1 class="Showing">NOW SHOWING IN CINEMA</h1>
    <div class="wrapper">
        <div class="carousel">
            <?php foreach ($film as $row) : ?>
                <a href="prebooking/<?php echo $row['id_film']; ?>">
                    <img src="image/<?php echo $row["gambar"];  ?>" alt="img" class="slide">
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="popup" id="contactPopup">
            <span class="close-btn" onclick="closeContactPopup()">&times;</span>
            <h2>Contact Information</h2>
            <p>Email: doaIBUCinema@google.com</p>
            <p>Phone: +62815992231</p>
            <p>Social Media: </p>
            <p>Instagram: @doaIbuCinema</p>
            <p>Twitter: @doaIbuCinema</p>
        </div>
        <script src="beranda.js"></script>
</body>

</html>
