<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>

    <!-- Liên kết CSS Bootstrap bằng CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

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
    $sqlSelect = "SELECT * FROM `products` WHERE id=$id;";

    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
    $resultSelect = mysqli_query($conn, $sqlSelect);
    $shop_suppliersRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if(empty($shop_suppliersRow)) {
        echo "Giá trị id: $id không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }
    ?>
    
    <!-- Main content -->
    <div class="container">
        <h1>Form Cập nhật Nhà cung cấp</h1>

        <form name="frmEdit" id="frmEdit" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="id" id="id" class="form-control" value="<?php echo $shop_suppliersRow['id'] ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Loại Sản Phẩm</td>
                    <td><select name="id_categorie" id="id_categorie"  class="form-control">
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $database = "tshirt_cart";
                        $password = "";

                        // create a connection
                        
                        $conn = new mysqli(
                            $servername,
                            $username,
                            $password,
                            $database
                        );


                        $sql = "SELECT * FROM categorie";
                        $req = $conn->query($sql);
                        while ($row = mysqli_fetch_assoc($req)) {
                            ?>
                            <option value=" <?= $row['id_categorie'] ?> "><?= $row['LoaiSp'] ?></option>;
                            <?php
                        }
                        ?>
                    </select></td>                </tr>
                <tr>
                    <td>Tên nhà cung cấp</td>
                    <td><input type="text" name="product_name" id="product_name" class="form-control" value="<?php echo $shop_suppliersRow['product_name'] ?>" /></td>
                </tr>
                <tr>
                    <td>Ghi chú</td>
                    <td><textarea name="short_description" id="short_description" class="form-control" value="<?php echo $shop_suppliersRow['short_description'] ?>" ></textarea></td>
                </tr>
                <tr>
                    <td>Giá Tiền</td>
                    <td><input type="text" name="price" id="price" class="form-control" value="<?php echo $shop_suppliersRow['price'] ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Lưu dữ liệu</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>


    <?php
    // 4. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
    if (isset($_POST['btnSave'])) {
        // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
        $id_categorie = $_POST['id_categorie'];
        $product_name = $_POST['product_name'];
        $short_description = $_POST['short_description'];
        $price = $_POST['price'];
        $updated_at = date('Y-m-d H:i:s'); // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`. Vd: 2020-02-18 09:12:12

        // Câu lệnh UPDATE
        $sql = "UPDATE products SET id_categorie='$id_categorie', product_name='$product_name', short_description='$short_description', price='$price', updated_at='$updated_at' WHERE id=$id;";

        // Thực thi UPDATE
        mysqli_query($conn, $sql);

        // Đóng kết nối
        mysqli_close($conn);

        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:../gestion.php');
    }
    ?>

    <!-- Liên kết JS Jquery bằng CDN -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <!-- Liên kết JS Popper bằng CDN -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- Liên kết JS Bootstrap bằng CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Liên kết JS FontAwesome bằng CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>

</html>