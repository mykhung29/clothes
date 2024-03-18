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
.button-89 {
  --b: 3px;   /* border thickness */
  --s: .45em; /* size of the corner */
  --color: #373B44;
  
  padding: calc(.5em + var(--s)) calc(.9em + var(--s));
  color: var(--color);
  --_p: var(--s);
  background:
    conic-gradient(from 90deg at var(--b) var(--b),#0000 90deg,var(--color) 0)
    var(--_p) var(--_p)/calc(100% - var(--b) - 2*var(--_p)) calc(100% - var(--b) - 2*var(--_p));
  transition: .3s linear, color 0s, background-color 0s;
  outline: var(--b) solid #0000;
  outline-offset: .6em;
  font-size: 16px;

  border: 0;

  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-89:hover,
.button-89:focus-visible{
  --_p: 0px;
  outline-color: var(--color);
  outline-offset: .05em;
}

.button-89:active {
  background: var(--color);
  color: #fff;
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
                <button class="button-89"type="submit" name="buynow">Mua ngay</button>
            </form>
            

            <form method="post" action="giohang.php">
                <input type="hidden" name="product_id" value="'. $row["idsanpham"] .'">
                <input type="hidden" name="product_name" value="'. $row["name"] .'">
                <input type="hidden" name="product_price" value="'. $row["price"] .'">
                <input type="hidden" name="product_img" value="'. $row["img"] .'">
                <input type="hidden" name="curent" value="'. $current_url .'">
                <button class="button-89" type="submit" name="addToCart">Thêm giỏ hàng</button>
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
