<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Xem Đơn Hàng</title>
<link rel="stylesheet" href="css/admindonhang.css">
</head>
<body>
    <div class="container">
        <h1>Danh sách đơn hàng</h1>
        
        <table>
            <tr>
                
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Tình trạng</th>
                <th>Xóa</th>
                <!-- <th>Cập nhật<th> -->
            </tr>
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
                
                $idd = $_POST['id'];
              
                
                $sql1 = "DELETE FROM `donhang` WHERE id = $idd";
                $result1 = $conn->query($sql1);
    


            }





            if(isset($_POST['update'])){
                
                $idd = $_POST['id'];
                $tinhtrang = $_POST['update'];

            
                $sql1 = "UPDATE `donhang` SET tinhtrang = '$tinhtrang' WHERE id = '$idd'";
                $result1 = $conn->query($sql1);
    


            }

            // Lấy dữ liệu từ bảng orders
            $sql = "SELECT * FROM donhang";
            $result = $conn->query($sql);

            // Hiển thị dữ liệu
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $so_da_format = number_format($row["dongia"], 0, ',', '.');

                    echo "<tr>";
                    echo "<td>" . $row["tenkh"] . "</td>";
                    echo "<td>" . $row["diachi"] . "</td>";
                    echo "<td>" . $row["sdt"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["tensp"] . "</td>";
                    echo "<td><img src=\"img/ao/" . $row["img"] . "\" alt=\"\"></td>";
                    echo "<td>" . $so_da_format . "đ</td>";
                    echo "<td>" . $row["soluong"] . "</td>";
                    echo "<td>
                    <form method=\"POST\" action=\"\">
                        <select name=\"update\">
                            <option value=\"xacnhan\">Xác nhận</option>
                            <option value=\"danggiao\">Đang giao</option>
                            <option value=\"hoanthanh\">Hoàn Thành</option>
                        </select>
                        <input type=\"hidden\" value='" . $row["id"] . "' name=\"id\">
                        <button type=\"submit\" name=\"update\">Cập nhật</button>
                    </form>
                </td>";


                    echo " <td>
                            <form method=\"POST\" action=\"\">
                                <input type=\"hidden\" value='" . $row["id"] . "' name=\"id\">
                                <button type=\"submit\" name=\"delete\">Xóa</button>
                            </form></td>";

                    echo "</tr>";

                }
            } else {
                echo "<tr><td colspan='7'>Không có đơn hàng nào.</td></tr>";
            }

            // Đóng kết nối
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
