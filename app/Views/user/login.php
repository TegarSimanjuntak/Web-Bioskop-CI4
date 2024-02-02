<?php
$session = session();
if ($session->get('login') === true) {
    echo '<script>alert("' . $session->get('login') . '");</script>';
    header("Location: /");
    exit(); // Penting untuk keluar setelah pemanggilan header
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $loginSuccess = false;

    foreach ($user as $u) {
        if ($u['username'] == $username && $u['password'] == $password) {
            $loginSuccess = true;
            $session->set('login', true);
            $session->set('id_pengguna', $u['id_pengguna']);
            break;
           
        }
    }

    if ($loginSuccess) {
        header('Location: /');
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/2772922.png" type="image/logo.png">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;9008display=swap");

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url(image/vacation.jpg);
            background-size: cover;
            background-position: center;
        }
        .wrapper{
            width: 420px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .1);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            color: #fff;
            border-radius: 10px;
            padding: 30px 40px;
        }
        .wrapper h1{
            font-size: 36px;
            text-align: center;
        }
        .wrapper .input-box{
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
        }
        .input-box input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .1);
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;
        }
        .input-box input::placeholder{
            color: #fff;
        }
        .input-box i{
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }
        .wrapper .Ingat-Saya{
            display: flex;
            justify-content: space-between;
            font-size: 14.5px;
            margin: -15px 0 15px;
        }
        .Ingat-Saya label input{
            accent-color: #fff;
            margin-right: 3px;
        }
        .Ingat-Saya a{
            color: #fff;
            text-decoration: none;
        }
        .Ingat-Saya a:hover{
            text-decoration: underline;
        }
        .wrapper .btn{
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
        }
        .wrapper .register-link{
            font-size: 14.5px;
            text-align: center;
            margin-top: 20px 0 15px;
        }
        .register-link p a{
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }
        .register-link p a:hover{
            text-decoration: underline;
        }
        .register{
            width: 620px;
        } 
    </style>
    <title>Bioskop</title>
</head>
<body>
    <div class="wrapper">
    <?php 
    
    ?>
        <form action="" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username"name="username" id="username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="password" name="password" id="password" required>
                <i class='bs bxs-lock-alt'></i>
            </div>
            <?php 
            if(isset($error)){
                echo "
                <p>password/username salah!
                </p>";
            }
             ?>
            <button type="submit" class="btn" name="login"> Login </button>
            <a href="beranda.html"></a>
            <div class="register-link">
                <br>
                <p> Silahkan register jika belum punya akun! <a href="user/register"> Register </a></p>
            </div>
        </form>
    </div>
</body>
</html>