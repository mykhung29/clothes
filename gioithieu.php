<style>
body{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    overflow-x: hidden;

}


#wrapper {
    width: 100%;
}

#header {
    width: auto;
    padding: 0px 30px;
    margin-top: 33px;
    display: flex;
    justify-content: space-between;
    align-items: center;
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


#banner {
    width: 100%;
    background-image: url(img/logo/banner3.jpg);
    height: 463px;
    margin-top: 40px;
    display: flex;
    padding: 0px 133px;
    position: relative;
}

#banner .box-left, #banner .box-rigth{
    width:  50%;
}

#banner .box-left h2{
    font-size: 48px;
    margin-top: 75px;
    color: #fff;
}

#banner .box-left p{
    color: #fff;
}

#banner .box-left button {
    width: 191px;
    height: 40px;
    margin-top: 41px;
    background: #1d1d1d;
    border: none;
    outline: none;
    color: #fff;
    font-weight: bold;
    border-radius: 20px;
    transition:0.4s;
}
#banner .box-left button a{
    color: #fff;
}
#banner .box-left button:hover{
    background: olive;
}

#wp-collab{
   
    padding-left: 134px;


}
#wp-collab h2{
    text-align: center;
    margin-bottom: 76px;
    font-size: 32px;
    color: #626A67;
}
#wp-collab p{
    font-size: 18px;
    font-family: Arial, sans-serif;
    #wp-collab .content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px; 
}
}
#wp-collab .align-right {
    width: 40%; /* Adjust image width as needed */
}

.content {
    font-family: "Roboto", Arial, sans-serif; /* Font chữ */
    font-size: 18px; /* Kích thước font */
    line-height: 1.6; /* Khoảng cách giữa các dòng */
    color: #555; /* Màu chữ */
    
}

.content p {
    margin-bottom: 15px; /* Khoảng cách dưới của đoạn văn */
}

.content img {
    max-width: 100%; /* Ảnh không vượt quá kích thước của phần tử cha */
    height: auto; /* Đảm bảo tỷ lệ khung hình của ảnh được bảo toàn */
    display: block; /* Để tránh các khoảng trắng không mong muốn ở dưới ảnh */
    margin-bottom: 15px; /* Khoảng cách dưới của ảnh */
}

#wp-collab h2 {
    text-align: center;
    margin-bottom: 20px; /* Thay đổi khoảng cách giữa tiêu đề và nội dung tiếp theo */
    font-size: 32px;
    color: #626A67;
}


</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img\logo\logotd.webp">
    <title>DIRTYCOINS</title>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <a href="" class="logo">
                <img src="img\logo\logo (1).png" style="width: 200px;" "">
            </a>
            <div id="menu">
                <div class="item">
                    <a href="Home.php">Trang chủ</a>
                </div>
                <div class="item">
                    <a href="sanpham.php">Danh mục sản phẩm</a>
                </div>
                <div class="item">
                    <a href="lienhe.php">Liên hệ</a>
                </div>
                <div class="item">
                    <a href="giohang.php">Giỏ hàng</a>
                </div>
            </div>
        </div>
        <div id="banner">
            <div class="box-left">
                <h2>
                    <span>DIRTY COINS</span>
                </h2>
                <p>
                   Con đường chinh phục Streetwear của thương hiệu DirtyCoins được bắt đầu từ 2017 tại Sài Gòn - Việt Nam, xuất phát ý tưởng về một thương hiệu Việt mang văn hóa đường phố. Với những kinh nghiệm gói ghém từ thương hiệu tiền thân The Yars Shop, anh Khoa Sen đã đã bắt đầu cuộc hành trình DirtyCoins cùng những người bạn GenZ đầy nhiệt huyết và sáng tạo.
                </p>  
                <button> 
                    <a href="Home.php">Mua ngay</a>
                </button>
            </div>
        </div>
    </div>
    <div id="wp-collab">
            <h2>SINCE 2017</h2>
            <div class="content">
                <img src="img\logo\img1.jpg">
                <p>Thương hiệu DirtyCoins chính thức ra đời, với cửa hàng đầu tiên tại đường Điện Biên Phủ, quận Bình Thạnh, Thành phố Hồ Chí Minh.
                    Cửa hàng thứ 2 tại đường Bắc Hải, quận 10, thành phố Hồ Chí Minh.
                </p>
            </div>
            <div class="content">
                <img src="img\logo\img3.png">
                <p>Cửa hàng thứ 3 tại quận 1, thành phố Hồ Chí Minh.</p>
                <p>Cửa hàng thứ 4 tại đường phố Huế, quận Hai Bà Trưng, Hà Nội.</p>
            </div>
            <div class="content">
                <img src="img\logo\img4.jpg">
                <p>Cửa hàng thứ 5 tại số 15 Phan Trung, Biên Hoà.</p>
                <p>Cửa hàng thứ 6 tại 49 Hồ Đắc Di, Hà Nội.</p>
                <p>Cửa hàng thứ 7 tại 52 Mậu Thân, Thành phố Cần Thơ.</p>
                <p>Cửa hàng thứ 8 tại Lý Tự Trọng, Quận 1, Thành phố Hồ Chí Minh.</p>
                <p>Cửa hàng thứ 9 tại Lê Lai, Quận 1, Thành phố Hồ Chí Minh.</p>   
            </div>
            <div class="content">
                <img src="img\logo\img5.jpg">
                <p>Trải qua giai đoạn giãn cách xã hội suốt hơn 4 tháng do đại dịch Covid-19, để duy trì hoạt động ở giai đoạn khó khăn này kèm với nhiều thay đổi và biến chuyển khó lường của thị trường, nên lãnh đạo công ty quyết định rút gọn số lượng cửa hàng còn 8. Giai đoạn cuối 2021 cho đến Quý 2 - 2022 là giai đoạn chúng tôi biến chuyển tích cực về mặt cơ cấu sản phẩm và tuyển dụng nhân sự.</p>
            </div>
    </div> 
<footer>
   <?php include 'D:\NienLuan\headfoot\footer.php'; ?>
</footer>
</body>

</html>
