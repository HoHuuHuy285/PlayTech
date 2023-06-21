<?php
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
$servername = "localhost";
$username = "root";
$database = "tshirt_cart";
$password = "";

// create a connection

$conn = new mysqli($servername,
                    $username, 
                    $password, 
                    $database);


// 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
// Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
$id = $_GET['id'];
$sql = "DELETE FROM `products` WHERE id=$id;";

// 3. Thực thi câu lệnh DELETE
$result = mysqli_query($conn, $sql);

// 4. Đóng kết nối
mysqli_close($conn);

// Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
header('location:../gestion.php');