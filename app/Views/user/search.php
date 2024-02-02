

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/admin.css">
    <title>Search Film</title>
</head>
<body>
<h2 class="beranda"><a href="/">Beranda</a></h2>
<form action="/user/search" method="post">
        <input type="text" class="pencarian" id="searchInput" placeholder="Cari..." name="keyword">
        <button type="submit" name="submit">Cari</button>
        </form>
<table border="1">
    <tr>
        <th>No.</th>
        <th>Nama Film</th>
        <th>Sampul</th>
        <th>Deskripsi Film</th>
        <th>Detail</th>
    </tr>
    <?php $no=1 ?>
    <?php foreach($film as $f): ?>
    <tr>
        <td><?php echo $no?></td>
        <td><?php echo $f['nama_film'] ?></td>
        <td><img src="../image/<?= $f['gambar']; ?>" alt="Film Image" style="max-width: 100px;"></td>
        <td><?= $f['deskripsi_film']; ?></td>
        <td><a href="/prebooking/<?php echo $f['id_film']; ?>">Detail</a></td>
        
        <?php $no++ ?>
            
        
    </tr>
    <?php endforeach ?>
</table>




</body>
</html>