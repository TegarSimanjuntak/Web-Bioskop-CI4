
<?php 
$session = session();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/2772922.png" type="image/logo.png">
   
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('../image/vacation.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .wrapper {
            width: 420px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #fff;
            border-radius: 10px;
            padding: 30px 40px;
            margin-top: 30px;
        }

        .wrapper h1 {
            font-size: 36px;
            text-align: center;
        }

        .wrapper .input-box {
            position: relative;
            width: 100%;
            height: 40px; /* Adjusted height */
            margin: 20px 0; /* Adjusted margin */
        }

        .input-box input {
            width: 90%;
            height: 50%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 40px; /* Adjusted border radius */
            font-size: 16px;
            color: #fff;
            padding: 10px 20px; /* Adjusted padding */
        }

        .input-box input::placeholder {
            color: #fff;
        }

        .input-box i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }

        .wrapper .btn {
            width: 100%;
            height: 45px;
            background: #4CAF50;
            border: none;
            outline: none;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            font-weight: 600;
            margin-top: 20px; /* Adjusted margin */
        }

        .wrapper .btn:hover {
            background-color: #45a049;
        }

        .register-link {
            font-size: 14.5px;
            text-align: center;
            margin-top: 20px 0 15px;
        }

        .register-link p a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link p a:hover {
            text-decoration: underline;
        }
        .logout-link {
            color: green;
            font-weight: bold;
            text-decoration: none;
        }

        .logout-link:hover {
            text-decoration: underline;
        }
    </style>
    <title>Register akun</title>
</head>
<body>
    <div class="wrapper register">
    <?php 
    
    ?>
        <form action="/user/save" method="post">
            <h1>Register</h1>
            
            <div class="input-box">
                <input type="text" placeholder="Nama"name="nama_pengguna" id="nama_pengguna" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Umur" name="umur_pengguna" id="umur_pengguna" required>
                <i class='bs bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Username" name="username" id="username" required>
                <i class='bs bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" id="password" required>
                <i class='bs bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Konfirmasi ulang password" name="password2" id="password2" required>
                <i class='bs bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="E-mail" name="email_pengguna" id="email_pengguna" required>
                <i class='bs bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="No. telepon" name="no_telepon" id="no_telepon" required>
                <i class='bs bxs-lock-alt'></i>
            </div>
            <?php 
            
             ?>

            <button type="submit" class="btn" name="register"> Register </button>
            <p>Sudah punya akun? Silahkan <a class="logout-link" href="/login">login</a></p>
        </form>
    </div>
</body>
</html>