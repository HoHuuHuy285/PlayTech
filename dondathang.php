<?php
session_start();
$_SESSION['page'] = 'Order';
if (isset($_SESSION['name']) && $_SESSION['admin'] == 1) {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- style css link  -->
        <link rel="stylesheet" href="./style/style.css?v=<?php echo time(); ?>">
        <title>PlayTech - Order</title>

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

        <!-- Datatables JS -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <!-- Datatables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

        <!-- boxicon link -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <!-- sweet alert  -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- bootstrap link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

    <body class="d-flex flex-column h-100">
        </div>
        <!-- header -->
        <?php include('layouts/header.php'); ?>
        <!-- end header -->
        </div>
        <div class="container">

            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Danh sách</h1>
            </div>

            <!-- Block content -->
            <?php
            // Truy vấn database để lấy danh sách
            // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
            include "./style/admin/connection.php";

            $conn->query("SET NAMES 'utf8mb4'");
            $conn->query("SET CHARACTER SET utf8mb4");
            $conn->query("SET SESSION collation_connection = 'utf8mb4_unicode_ci'");
            $sql = "SELECT * FROM orders";

            $result = mysqli_query($conn, $sql);

            $data = [];
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $data[] = array(
                    'id' => $row['id'],
                    'created_at' => date('d/m/Y H:i:s', strtotime($row['created_at'])),
                    'updated_at' => empty($row['updated_at']) ? '' : date('d/m/Y H:i:s', strtotime($row['updated_at'])),
                    'state' => $row['state'],
                    'order_status' => $row['order_status'],
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'email' => $row['email'],
                    'code' => $row['zipcode'],
                    'total_price' => number_format($row['total_price'], 2, ".", ",") . ' $',
                );
            }
            ?>
            <table id="myTable" class="table table-bordered table-hover table-sm table-responsive mt-2">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Order date</th>
                        <th>Buyer's City</th>
                        <th>Zip Code</th>
                        <th>Total</th>
                        <th>Payment Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $dondathang): ?>
                        <tr>
                            <td>
                                <?= $dondathang['id'] ?>
                            </td>
                            <td><b>
                                    <?= $dondathang['first_name'] ?>
                                    <?= $dondathang['last_name'] ?>
                                </b><br />(
                                <?= $dondathang['email'] ?>)
                            </td>
                            <td>
                                <?= $dondathang['created_at'] ?>
                            </td>
                            <td>
                                <?= $dondathang['state'] ?>
                            </td>
                            <td><span class="badge badge-primary">
                                    <?= $dondathang['code'] ?>
                                </span></td>
                            <td>
                                <?= $dondathang['total_price'] ?>
                            </td>
                            <td>
                                <?php if ($dondathang['order_status'] != 'confirmed'): ?>
                                    <span class="badge badge-danger">Unprocessed</span>
                                <?php else: ?>
                                    <span class="badge badge-success">Delivered</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- End block content -->
            </main>
        </div>
        </div>

        <!-- footer -->
        <?php include_once "layouts/footer.php" ?>
        <!-- end footer -->



    </body>

    </html>
    <?php
}