<style>

body{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    overflow-x: hidden;

}




#header {
    width: auto;
    padding : 25px ;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}

#menu {
    list-style: none;
    display: flex;
}

#menu .item {
    margin: 0px 15px; /* Thu nhỏ khoảng cách giữa các mục menu */
    text-align: center; 
    margin-left: 15px; 
}

#menu .item a {
    color: #626A67;
    text-decoration: none;
   
}
.search-container {
    display: flex;
    align-items: center;
    border : 1px solid #626A67;
    border-radius : 5px;

   
}

.search-container input {
    padding: 8px;
    font-size: 14px;
    border: none;
    border-radius: 4px 0 0 4px;
}

.search-container button {
    padding: 8px 12px;
    font-size: 14px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 0 4px 4px 0;
    cursor: pointer;
}

/* CSS hiệu ứng nhồi lên khi hover vào sản phẩm */
.product {
    /* Các quy tắc CSS khác cho sản phẩm */
    transition: transform 0.3s ease; /* Thêm transition để tạo hiệu ứng mượt mà */
}

.product:hover {
    transform: scale(1.05); /* Kích thước sản phẩm sẽ nhồi lên 5% khi hover */
}


.dropdown {
    position: relative;
    display: inline-block;
    margin: 0px 15px;
    text-align: center;
    margin-left: 15px
    
}
.dropdown a{
    text-decoration: none;
    color: #626A67;

    
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    margin-left: 40px;
}

.dropdown:hover .dropdown-content {
    display: block;
}
ul {
    list-style-type: none; /* Tắt dấu chấm của danh sách không có thứ tự (ul) */
    padding: 0; /* Loại bỏ padding mặc định của danh sách */
}
.dropdown li {
    margin-top: 15px;
    text-decoration: none;
    padding: 5px;
}


.dropdown li:hover {
    background-color : grey;
}

</style>


<div id="wrapper">
        <div id="header">
            <a href="Home.php" class="logo">
                <img src="img\logo\logo (1).png" style="width: 200px;" ""> <!-- Thu nhỏ logo -->
            </a>
            <div id="menu">
                <div class="item">
                    <a href="Home.php">Trang chủ</a>
                </div>
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
                    <!-- Thêm các mục sản phẩm khác vào đây -->
                </ul>
            </div>
        </div>
                <div class="item">
                    <a href="lienhe.php">Liên hệ</a>
                </div>
                <div class="item">
                    <a href="giohang.php">Giỏ hàng</a>
                </div>
            </div>
            <div class="search-container">
                <form action="search.php" method="GET">
                    <input type="text" name="keyword" placeholder="Tìm kiếm...">
                    <button type="submit" name="search" >Tìm kiếm</button>
                </form>
    </div>
        </div>
       
</div>