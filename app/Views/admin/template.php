<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/admin.css">
    <title><?php echo $title; ?></title>
    <style>
.submit{
    margin-left:-65%;
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
    <form action="/admin/logout" method="post">
        <br>
        <button type="submit" class="submit">Logout</button>
    </form>

    <?php echo $this->renderSection('content'); //bagian body ( yang berubah-ubah tiap page)?>
</body>
</html>
