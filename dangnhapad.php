<?php
// Thông tin kết nối database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nienluan";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
$error_message = "";
if (isset($_POST['login'])) {
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];
    
   
    if ($taikhoan === 'admin' && $matkhau === '123456') {
   
        header("Location: dashbroad.php");
        exit; 
    } else {
  
        $error_message = "<p>Tài khoản hoặc mật khẩu không chính xác.</p>";
    }
   
} 


// Đóng kết nối
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img\logo\logotd.webp">
    <title>Đăng nhập</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'poppins', sans-serif;
        }

        section {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;
    background: url(img/logo/hinhanh2.jpg) no-repeat;
    background-position: center;
    background-size: cover; /* Đặt background-size thành "cover" */
}


        .form-box {
            position: relative;
            width: 400px;
            height: 450px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h2 {
            font-size: 2em;
            color: #2e17b4;
            text-align: center;
        }

        .inputbox {
            position: relative;
            margin: 30px 0;
            width: 310px;
            border-bottom: 2px solid #fff;
        }

        .inputbox label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            color: #2e17b4;
            font-size: 1em;
            pointer-events: none;
            transition: .5s;
        }

        input:focus~label,
        input:valid~label {
            top: -5px;
        }

        .inputbox input {
            width: 100%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            padding: 0 35px 0 5px;
            color: #fff
        }

        .inputbox ion-icon {
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
            top: 20px;
        }
        button {
            width: 100%;
            height: 40px;
            border-radius: 40px;
            background: #2e17b4;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
        }

        .register {
            font-size: .9em;
            color: #fff;
            text-align: center;
            margin: 25px 0 10px;
        }

        .register p a {
            text-decoration: none;
            color: #fff;
            font-weight: 600;
        }

        .register p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <h2>Đăng Nhập</h2>
                <form action="" method="post">
                    <div class="inputbox">
                        <ion-icon name="call-outline"></ion-icon>
                        <input class="inputLoginUsername" name="taikhoan" type="text" required />
                        <label for="">Tên đăng nhập</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input class="inputLoginPwd" name="matkhau" type="password" required />
                        <label for="">Mật khẩu</label>
                    </div>
                    <button name ="login" type="submit" class="btn login__signInButton">Đăng nhập</button>
                </form>
                <?php echo $error_message; ?>
            </div>
        </div>
    </section>  
</body>
</html>
