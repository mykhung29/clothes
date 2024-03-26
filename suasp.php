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
    header("Location: xoasp.php");
  }
 
  if(isset($_POST['saveupdate'])){
    // Lấy dữ liệu từ form
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productImg = $_POST['productImg'];
    $productType = $_POST['productType'];
    $productId = $_POST['product_id'];

    // Thực hiện cập nhật vào cơ sở dữ liệu
    $sql = "UPDATE `sanpham` SET name = '$productName', price = '$productPrice', img = '$productImg', typee = '$productType' WHERE idsanpham = '$productId'";
    
    // Thực thi truy vấn
    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật sản phẩm thành công!";
        header("Location: xoasp.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
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
        <h2>Sửa Sản Phẩm</h2>


<?php
// Kiểm tra xem có dữ liệu được gửi từ biểu mẫu không
if(isset($_POST['update'])){
    // Nhận product_id từ biểu mẫu
    $id = $_POST['product_id'];

    // Thực hiện truy vấn để lấy dữ liệu từ cơ sở dữ liệu dựa trên product_id
    $sql = "SELECT * FROM `sanpham` WHERE idsanpham = '$id'";
    $result = $conn->query($sql);

    // Kiểm tra xem truy vấn có thành công không
    if($result === false) {
        // Xử lý lỗi nếu có
        echo "Lỗi truy vấn SQL: " . $conn->error;
    } else {
        // Kiểm tra xem có dòng dữ liệu được trả về hay không
        if ($result->num_rows > 0) {
            // Duyệt qua từng hàng kết quả và hiển thị dữ liệu
            while($row = $result->fetch_assoc()) {
                echo'
                <form action="" method="post">
                <label for="productName">Tên Sản Phẩm:</label>
                <input type="text" id="productName" name="productName" value="' . $row["name"] . '" required>
                
                <label for="productPrice">Giá Sản Phẩm:</label>  
                <input type="text" id="productPrice" name="productPrice" value="' . $row["price"] . '" required>
                
                <label for="productImg">Hình Sản Phẩm:</label>
                <input type="text" id="productImg" name="productImg" value="' . $row["img"] . '" required>
                <img src="img/ao/' . $row["img"] . '" alt="" width="100px">
                
                <label for="productType">Loại Sản Phẩm:</label>
                <input type="text" id="productType" name="productType" value="' . $row["typee"] . '" required>

                <input type="hidden" name="product_id" value="'. $row["idsanpham"] .'">

                <button type="submit" name="saveupdate" >Sửa sản phẩm</button>
            </form>
                ';
            }
        } else {
            echo "Không tìm thấy sản phẩm với ID này.";
        }
    }
} 
?>
       
    </div>
</body>

</html>