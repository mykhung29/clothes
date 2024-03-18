<?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "nienluan";
  // Kết nối đến cơ sở dữ liệu
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Kiểm tra kết nối
  if ($conn->connect_error) {
      die("Kết nối thất bại: " . $conn->connect_error);
  }

  if(isset($_POST['delete'])){
    $id = $_POST['product_id'];

    $sql = "DELETE FROM `sanpham` WHERE idsanpham = '$id'";
    $delete = $conn->query($sql);
    

  }

?>








<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Danh Sách Sản Phẩm</title>
<link rel="stylesheet" href="css/xoa.css">
</head> 
<body>
    <div class="container">
        <h1>Danh Sách Sản Phẩm</h1>
        <div class="product-list">
            <?php

          

            // Lấy dữ liệu từ bảng products
            $sql = "SELECT * FROM sanpham";
            $result = $conn->query($sql);

            // Hiển thị dữ liệu
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<img src='img/ao/" . $row["img"] . "' alt=''>";
                    echo "<h2>" . $row["name"] . "</h2>";
                    echo "<p>Giá: " . $row["price"] . "</p>";
                    echo "<form action='' method='POST'>";
                    echo "<input type='hidden' name='product_id' value='" . $row["idsanpham"] . "'>";
                    echo "<button type='submit' name ='delete' >Xóa</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<p>Không có sản phẩm nào.</p>";
            }

            // Đóng kết nối
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
