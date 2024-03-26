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

$productId = isset($_GET['id']) ? $_GET['id'] : null;

$sql = "SELECT * FROM sanpham WHERE idsanpham = $productId";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm đẹp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

       

        section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            max-width: 800px;
            margin: 2em auto;
            padding: 1em;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        nav a:hover {
    background: #72767d;
    transition: all 0.3s;
}

        .product-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 1em;
        }
        section img {
            height: 350px;
        }
        .product-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 1em;
        }

        .product-actions button {
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            margin-right: 10px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
            bottom: 0;
            width: 100%;
        }


/* CSS */

.button-55 {
  align-self: center;
  background-color: #fff;
  background-image: none;
  background-position: 0 90%;
  background-repeat: repeat no-repeat;
  background-size: 4px 3px;
  border-radius: 15px 225px 255px 15px 15px 255px 225px 15px;
  border-style: solid;
  border-width: 2px;
  box-shadow: rgba(0, 0, 0, .2) 15px 28px 25px -18px;
  box-sizing: border-box;
  color: #41403e;
  cursor: pointer;
  display: inline-block;
  font-family: Neucha, sans-serif;
  font-size: 1rem;
  line-height: 23px;
  outline: none;
  padding: .75rem;
  text-decoration: none;
  transition: all 235ms ease-in-out;
  border-bottom-left-radius: 15px 255px;
  border-bottom-right-radius: 225px 15px;
  border-top-left-radius: 255px 15px;
  border-top-right-radius: 15px 225px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-55:hover {
  box-shadow: rgba(0, 0, 0, .3) 2px 8px 8px -5px;
  transform: translate3d(0, 2px, 0);
}

.button-55:focus {
  box-shadow: rgba(0, 0, 0, .3) 2px 8px 4px -6px;
}
    </style>
</head>
<body>
<header class="full-header">
    <?php
        include 'D:\NienLuan\headfoot\header.php';
    ?>
    </header>

   



    <section>
        <?php 
            $so_da_format = number_format($row["price"], 0, ',', '.');
            echo '<h2>'. $row["name"] .'</h2>';
            echo '<h3>'. $so_da_format .'đ</h3>';
            echo '<img src="img/ao/'. $row["img"] .'" alt="">'
        ?>

       
        <h2>Mô tả sản phẩm</h2>
        <p>Đây là một sản phẩm tuyệt vời với thiết kế đẹp và chất lượng cao.</p>

        <div class="product-actions">
           
            <?php
             $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            echo'


            <form method="post" action="giohang.php">
                <input type="hidden" name="product_id" value="'. $row["idsanpham"] .'">
                <input type="hidden" name="product_name" value="'. $row["name"] .'">
                <input type="hidden" name="product_price" value="'. $row["price"] .'">
                <input type="hidden" name="product_img" value="'. $row["img"] .'">
                <button class="button-55"type="submit" name="buynow">Mua ngay</button>
            </form>
            

            <form method="post" action="giohang.php">
                <input type="hidden" name="product_id" value="'. $row["idsanpham"] .'">
                <input type="hidden" name="product_name" value="'. $row["name"] .'">
                <input type="hidden" name="product_price" value="'. $row["price"] .'">
                <input type="hidden" name="product_img" value="'. $row["img"] .'">
                <input type="hidden" name="curent" value="'. $current_url .'">
                <button class="button-55" type="submit" name="addToCart">Thêm giỏ hàng</button>
            </form>
            


            
            
            
            
            '

            
            
            
            ?>
            
        </div>
    </section>

    <footer>
       <?php 
       include 'D:\NienLuan\headfoot\footer.php'
       
       
       ?>
    </footer>


</body>
</html>
