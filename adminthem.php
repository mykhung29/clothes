<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productImg = $_POST["productImg"];
    $productType = $_POST["productType"];

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

    // Chuẩn bị truy vấn thêm dữ liệu vào bảng sản phẩm
    $sql = "INSERT INTO sanpham (`name`, `price`, `img`, `typee`) VALUES ('$productName', '$productPrice', '$productImg', '$productType')";

    // Thực thi truy vấn
    if ($conn->query($sql) === TRUE) {
        echo "Thêm sản phẩm thành công";
    } else {
        echo "Lỗi khi thêm sản phẩm: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input, select {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <title>Thêm Sản Phẩm</title>
</head>
<body>
    <div class="container">
        <h2>Thêm Sản Phẩm</h2>
        <form action="" method="post">
            <label for="productName">Tên Sản Phẩm:</label>
            <input type="text" id="productName" name="productName" required>
            <label for="productName">Giá Sản Phẩm:</label>
            <input type="text" id="productName" name="productPrice" required>
            <label for="productName">Hình Sản Phẩm:</label>
            <input type="text" id="productName" name="productImg" required>


            <label for="productName">Loại Sản Phẩm:</label>
            <input type="text" id="productName" name="productType" required>
            <button type="submit">Thêm Sản Phẩm</button>
        </form>
    </div>
</body>
</html>
