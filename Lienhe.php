<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="img\logo\logotd.webp">
    <title>Liên Hệ</title>
    <link rel="stylesheet" href="css/lienhe.css">
</head>
<body>
    <header class="full-header">
        <?php
            include 'D:\NienLuan\headfoot\header.php';
        ?>
        
    </header>

 
   
        <div class="main"> <form action="process_contact.php" method="post">
            <label for="name">Họ và Tên:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Nội dung:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Gửi</button>
        </form>
    </div>
</body>
<footer>
       <?php 
       include 'D:\NienLuan\headfoot\footer.php'
       ?>
    </footer>
</html>
