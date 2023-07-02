<?php
session_start();
$_SESSION['page'] = 'gestion';
if (isset($_SESSION['name']) && $_SESSION['admin'] == 1) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- style css link  -->
        <link rel="stylesheet" href="./style/style.css?v=<?php echo time(); ?>">
        <title>PlayTech - Gestion</title>

        <!-- google font  link-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:ital,wght@0,100;0,200;0,300;1,300;1,400;1,800;1,900&display=swap"
            rel="stylesheet">

        <!-- font awesome link "icone" -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <!-- jquery UI  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
            integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- jquery UI CSS  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css"
            integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- boxicon link -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <!-- sweet alert  -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- bootstrap link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- CDN: https://cdn.datatables.net/ -->
        <!-- Datatables JS -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

        <!-- Datatables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <?php
        include('layouts/header.php');
        ?>
    </head>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

    <body>
        </div>
        <!-- Main content -->
        <div class="container">
            <br><br><br>    
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">List of products</h1>
            </div>


            <?php
            // Truy vấn database để lấy danh sách
            // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
            include "./style/admin/connection.php";

            // Tùy chỉnh kết nối
            // Set charset là utf-8 đối với kết nối này. Dùng để gõ tiếng Việt, Nhật, Thái, Trung Quốc ...
            // Lưu ý: gõ với bộ gõ UNIKEY, bảng mã là UNICODE
            $conn->query("SET NAMES 'utf8mb4'");
            $conn->query("SET CHARACTER SET utf8mb4");
            $conn->query("SET SESSION collation_connection = 'utf8mb4_unicode_ci'");

            // 2. Chuẩn bị câu truy vấn $sql
            $sql = "SELECT products.id, products.product_name,categorie.LoaiSp, short_description, price, COUNT(order_details.id) AS Soluong
            FROM  products LEFT JOIN order_details ON products.product_name = order_details.product_name 
                                JOIN categorie ON products.id_categorie = categorie.id_categorie
            GROUP BY product_name;";

            // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
            $result = mysqli_query($conn, $sql);

            // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tách để sử dụng
            // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
            // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
            $data = [];
            $rowNum = 1;
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $data[] = array(
                    'rowNum' => $rowNum,
                    // sử dụng biến tự tăng để làm dữ liệu cột STT
                    'id' => $row['id'],
                    'product_name' => $row['product_name'],
                    'LoaiSp' => $row['LoaiSp'],
                    'short_description' => $row['short_description'],
                    'price' => $row['price'],
                    'Soluong' => $row['Soluong'],
                );
                $rowNum++;
            }
            ?>

            <!-- Button Thêm mới -->
            <a href="Edit/create.php" class="btn btn-primary">
                <i class="fas fa-plus"></i> Thêm mới
            </a>

            <div class="row">
                <div class="col-md-12">
                    <table id="myTable" class="table table-bordered table-hover table-sm table-responsive mt-2">
                        <thead class="thead-dark">
                            <tr>
                                <th>STT</th>
                                <th>Id Product</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Sold</th>
                                <th>###</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row): ?>
                                <tr>
                                    <td>
                                        <?php echo $row['rowNum']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['product_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['LoaiSp']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['short_description']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['price']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Soluong']; ?>
                                    </td>
                                    <td>
                                        <!-- Button Sửa -->
                                        <a href="Edit/edit.php?id=<?php echo $row['id']; ?>" id="btnUpdate"
                                            class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Button Xóa -->
                                        <a href="Edit/delete.php?id=<?php echo $row['id']; ?>" id="btnDelete"
                                            class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

    </html>
    <?php
} else {
    header("Location: ./connection");
    exit();
}
include_once "layouts/footer.php"
    ?>