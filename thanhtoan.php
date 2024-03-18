<?php
// Thông tin kết nối database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nienluan";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}


if (isset($_POST['thanhtoan'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    foreach ($_POST['tensp'] as $key => $value) {
        $tensp = $_POST['tensp'][$key];
        $dongia = $_POST['dongia'][$key];
        $soluong = $_POST['soluong'][$key];
        $img = $_POST['img'][$key];

        // Tạo câu lệnh SQL với thông tin của sản phẩm hiện tại
        $sql = "INSERT INTO `donhang`(`tensp`, `img`,`dongia`, `soluong`, `tenkh`, `email`, `sdt`, `diachi`) 
        VALUES ('$tensp','$img' ,'$dongia', '$soluong', '$name', '$email', '$phone', '$address')";

        // Thực thi câu lệnh SQL
        $conn->query($sql);

    $sql1 = "DELETE FROM `tongtien`  ";
    $conn->query($sql1);


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
<title>Thông báo đặt hàng thành công</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .notification {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    h1 {
        color: #333;
    }
    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
<div class="notification">
    <h1>Đặt hàng thành công!</h1>
    <p>Cảm ơn bạn đã mua hàng.</p>
    <button onclick="window.location.href='Home.php'">Tiếp tục mua sắm</button>
</div>
</body>
</html>

