<style>
body{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    overflow-x: hidden;

}


#wrapper {
    width: 100%;
    height: 100vh;
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
    padding: 116px;
    padding-bottom: 78px;
    padding-left: 134px;
    padding-right: 134px;

}
#wp-collab h2{
    text-align: center;
    margin-bottom: 76px;
    font-size: 32px;
    color: #626A67;
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIRTYCOINS</title>
</head>
<body>

    <div id="wrapper">
        <div id="header">
            <a href="" class="logo">
                <img src="img\logo\logo.webp" style="width: 100px;"> <!-- Thu nhỏ logo -->
            </a>
            <div id="menu">
                <div class="item">
                    <a href="">Trang chủ</a>
                </div>
                <div class="item">
                    <a href="">Sản phẩm</a>
                </div>
                <div class="item">
                    <a href="">Blog</a>
                </div>
                <div class="item">
                    <a href="">Liên hệ</a>
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
        <div id="wp-collab">
            <h2>SỰ KẾT HỢP</h2>
        </div>
    </div>
</body>
</html>
