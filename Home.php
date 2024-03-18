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

$laysanpham = "SELECT * FROM `sanpham` LIMIT 8;
";
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
    <title>Trang Chủ </title>
    <link rel="stylesheet" href="css/home.css">

</head>
<body>
    <header class="full-header">
    <?php
        include 'D:\NienLuan\headfoot\header.php';
    ?>
    </header>


    <main>
        <!-- <nav>
            <a href="#">Trang chủ</a>
            <div class="dropdown">
            <a href="#">Danh mục sản phẩm</a>
            <div class="dropdown-content">
                <ul class="product-list">
                    <li><a href="sanpham.php?type=ao">Áo</a></li>
                    <li><a href="sanpham.php?type=quanjean">Quần Jeans</a></li>
                    <li><a href="sanpham.php?type=quanngan">Quần Short</a></li>
                    <li><a href="sanpham.php?type=dep">Dép</a></li>
                    <li><a href="sanpham.php?type=balo">BaLo</a></li>
                    <li><a href="sanpham.php?type=non">Nón</a></li>
                </ul>
            </div>
        </div>
            <a href="Lienhe.php">Liên hệ</a>
            <a href="Giohang.php">Giỏ hàng</a>
        </nav> -->
        <div class="banner">
            <div class="image-container">   
                <img src="img\logo\anh1.jpg" alt="Image 1" class="banner-image">
                <img src="img\logo\anh2.jpg" alt="Image 2" class="banner-image">
            </div>
                <h2>DIRTYCOINS X ONE PIECE COLLECTION 2024 </h2>
                <img src="img\logo\logoop.png" alt="Logo" class="logoop">
        </div>
    

        <div class="tieude">
                <h1>SẢN PHẨM NỔI BẬT</h1>
        </div>
        <section>
            <?php 
                $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                 if ($laydudieusanpham->num_rows > 0) {
                    // Sử dụng vòng lặp while để duyệt qua dữ liệu
                    while ($row = $laydudieusanpham->fetch_assoc()) {

                        $so_da_format = number_format($row["price"], 0, ',', '.');
                        echo '
                        <a href="chitiet.php?id='. $row["idsanpham"] .'"><div class="product">
                        <h2>'. $row["name"] .'</h2>
                        <p>Giá: '. $so_da_format .'đ</p>
                        <img src="img/ao/'. $row["img"] .'" alt="">
                        <div class="button">
                            <form method="post" action="giohang.php">
                                    <input type="hidden" name="product_id" value="'. $row["idsanpham"] .'">
                                    <input type="hidden" name="product_name" value="'. $row["name"] .'">
                                    <input type="hidden" name="product_price" value="'. $row["price"] .'">
                                    <input type="hidden" name="product_img" value="'. $row["img"] .'">
                                    <button class="button-89" type="submit" name="buynow">Mua ngay</button>
                            </form>
                            <form method="post" action="giohang.php">
                                    <input type="hidden" name="product_id" value="'. $row["idsanpham"] .'">
                                    <input type="hidden" name="product_name" value="'. $row["name"] .'">
                                    <input type="hidden" name="product_price" value="'. $row["price"] .'">
                                    <input type="hidden" name="product_img" value="'. $row["img"] .'">
                                    <input type="hidden" name="curent" value="'. $current_url .'">
                                    <button class="button-89" onclick="addToCart()" type="submit" name="addToCart">Thêm giỏ hàng</button>
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
