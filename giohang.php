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
if (isset($_POST['buynow'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_img = $_POST['product_img'];
    $soluong = 1;

    $query_check = "SELECT * FROM tongtien WHERE  idsanpham = $product_id";
    $result_check = mysqli_query($conn, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Nếu sản phẩm đã tồn tại, cập nhật số lượng
        $query_update = "UPDATE `tongtien` SET soluong = soluong + 1 WHERE idsanpham = $product_id";
        mysqli_query($conn, $query_update);
    } else {
        // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
        $sql = "INSERT INTO `tongtien` (`tensp`, `hinhsp`, `dongia`, `soluong`, `idsanpham`) 
        VALUES ('$product_name', '$product_img',  '$product_price', '$soluong',  '$product_id')";   
        $conn->query($sql);
    }

}

////////////////////////
if (isset($_POST['addToCart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_img = $_POST['product_img'];
    $soluong = 1;
    $current = $_POST['curent'];

    $query_check = "SELECT * FROM tongtien WHERE  idsanpham = $product_id";
    $result_check = mysqli_query($conn, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Nếu sản phẩm đã tồn tại, cập nhật số lượng
        $query_update = "UPDATE `tongtien` SET soluong = soluong + 1 WHERE idsanpham = $product_id";
        mysqli_query($conn, $query_update);
    } else {
        // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
        $sql = "INSERT INTO `tongtien` (`tensp`, `hinhsp`, `dongia`, `soluong`, `idsanpham`) 
        VALUES ('$product_name', '$product_img',  '$product_price', '$soluong',  '$product_id')";   
        $conn->query($sql);
    }
    header("Location: $current");
    exit(); // Đảm bảo không có mã HTML hoặc mã PHP nào được thực thi sau lệnh chuyển hướng.
    
    
}////////////////////////

if (isset($_POST['deleteProduct'])) {
    $productIdToDelete = $_POST['deleteProductId'];

    // Thực hiện xóa sản phẩm có ID tương ứng từ cơ sở dữ liệu
    $query_delete = "DELETE FROM tongtien WHERE idsanpham = $productIdToDelete";
    mysqli_query($conn, $query_delete);

    // Refresh trang để cập nhật giỏ hàng
    header("Location: giohang.php");
    exit();
}

$hienthi =  $conn->query("SELECT * FROM `tongtien` WHERE 1");
$totalPrice = 0;



// Đóng kết nối

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="img\logo\logotd.webp">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="css/giohang.css">
    <style>
        .left-side {
            float: left;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .right-side {
            float: left;
            width: 50%;
            background-color: #e5e5e5;
            padding: 20px;
        }
        /* Đảm bảo chiều cao của cả hai phần bằng nhau */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>
    <header class="full-header">
        <?php
            include 'D:\NienLuan\headfoot\header.php';
        ?>
        
    </header>

 
<div class="content">
<h2>Danh sách sản phẩm trong giỏ hàng</h2>

<div class="tow-side">
    <div class="left-side">
    <table>
    <tr>
        <th>Hình ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Giá đơn vị</th>
        <th>Số lượng</th>
        <th>Tổng chi phí</th>
        <th>Xóa</th>
    </tr>
    <?php  while ($row = $hienthi->fetch_assoc()) { 
            $tongtien = $row["dongia"] * $row["soluong"];

             $so_da_format = number_format($tongtien, 0, ',', '.');
             $gia_da_format = number_format($row["dongia"], 0, ',', '.');
        echo'
        <tr>
            <td><img src="img/ao/'. $row["hinhsp"] .'" alt=""></td>
            <td>'. $row["tensp"] .'</td>
            <td>'.$gia_da_format .'đ</td>
            <td>'. $row["soluong"] .'</td>
            <td>'. $so_da_format.'đ</td>
            <td>
                <form method="post" action="">
                    <input type="hidden" name="deleteProductId" value="' . $row["idsanpham"] . '">
                    <button type="submit" name="deleteProduct">Xóa</button>
                </form>
            </td>

            
        </tr>' ;

        if (is_numeric($row["dongia"]) && is_numeric($row["soluong"])) {
            // Tính giá trị và cộng vào biến total
            $totalPrice += $row["dongia"] * $row["soluong"];
        } else {
            // Xử lý trường hợp giá trị không hợp lệ (ví dụ: ghi log, thông báo lỗi)
            echo "Error: Invalid dongia or soluong value for product ID " . $row["product_id"];
        }
        
    
    
    } ?>
   

    
    <!-- Thêm nhiều sản phẩm khác nếu cần -->
</table>

    </div>
    <div class="right-side">
    <form action="thanhtoan.php" method="post">
            <div class="form-group">
                <label for="name">Họ và Tên:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Số Điện Thoại:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <textarea id="address" name="address" rows="3" required></textarea>
            </div>
            <?php  
            $hienthi1 =  $conn->query("SELECT * FROM `tongtien` WHERE 1");

            while ($row1 = $hienthi1->fetch_assoc()) { 
            echo'
           
                
                <input type="hidden" name="tensp[]"   value="'. $row1["tensp"] .'">
                <input type="hidden" name="dongia[]"   value="'. $row1["dongia"] .'">
                <input type="hidden" name="soluong[]"   value="'. $row1["soluong"] .'">
                <input type="hidden" name="img[]"   value="'. $row1["hinhsp"] .'">
                


                
          ' ;} ?>
            <div class="form-group">
                <input type="submit" value="Thanh Toán" name="thanhtoan">
            </div>
           

           










        </form>
    </div>

</div>





<p class="total">Tổng cộng: $ <?php                          $tong_da_format = number_format($totalPrice, 0, ',', '.');
; echo  $tong_da_format ; ?> </p>
</div> 
    
        
</body>
<footer>
       <?php 
       include 'D:\NienLuan\headfoot\footer.php'
       ?>
    </footer>
</html>
