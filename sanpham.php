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
$type = isset($_GET['type']) ? $_GET['type'] : null;

$laysanpham = "SELECT * FROM sanpham where typee = '$type' ";
$laydudieusanpham = $conn->query($laysanpham);



// Đóng kết nối
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img\logo\logotd.webp">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <header class="full-header">
    <?php
        include 'D:\NienLuan\headfoot\header.php';
    ?>
    </header>


    <main>
        
  
        <section>
            <?php 
             $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                 if ($laydudieusanpham->num_rows > 0) {
                      
                    while ($row = $laydudieusanpham->fetch_assoc()) {
                        $so_da_format = number_format($row["price"], 0, ',', '.');
                        echo '
                        <a href="chitiet.php?id='. $row["idsanpham"] .'"><div class="product">
                        <h2>'. $row["name"] .'</h2>
                        <p>Giá: '.   $so_da_format .'đ</p>
                        <img src="img/ao/'. $row["img"] .'" alt="">
                        <div class="button">
                            <form method="post" action="giohang.php">
                                    <input type="hidden" name="product_id" value="'. $row["idsanpham"] .'">
                                    <input type="hidden" name="product_name" value="'. $row["name"] .'">
                                    <input type="hidden" name="product_price" value="'. $row["price"] .'">
                                    <input type="hidden" name="product_img" value="'. $row["img"] .'">
                                    <button class="button-55" type="submit" name="buynow">Mua ngay</button>
                            </form>
                            <form method="post" action="giohang.php">
                                    <input type="hidden" name="product_id" value="'. $row["idsanpham"] .'">
                                    <input type="hidden" name="product_name" value="'. $row["name"] .'">
                                    <input type="hidden" name="product_price" value="'. $row["price"] .'">
                                    <input type="hidden" name="product_img" value="'. $row["img"] .'">
                                    <input type="hidden" name="curent" value="'. $current_url .'">
                                    <button class="button-55" onclick="addToCart()" type="submit" name="addToCart">Thêm giỏ hàng</button>
        
                            </form>

                        </div>
                    
                      </div>

                      </a>
                      
                      <div id="cartMessage" style="display: none;"></div>

                        ';
                    }
                
                } else {
                    echo "Không có sản phẩm.";
                }
            
                
            ?>

            <!-- Thêm sản phẩm khác tại đây -->
        </section>


    </main>
    

    <footer>
       <?php 
       include 'D:\NienLuan\headfoot\footer.php'
       
       
       ?>
    </footer>

</body>
</html>
