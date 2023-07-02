<?php
session_start();
 if(!isset($_SESSION['confirm_order']) || empty($_SESSION['confirm_order']))
 {
     header('location:index.php');
     exit();
 }
include "./style/admin/connection.php";

$conn->query("SET NAMES 'utf8mb4'");
$conn->query("SET CHARACTER SET utf8mb4");
$conn->query("SET SESSION collation_connection = 'utf8mb4_unicode_ci'");

$sql = "SELECT * FROM order_details WHERE order_id = (SELECT MAX(order_id) FROM order_details); ";

$result = mysqli_query($conn, $sql);

$data = [];
$rowNum = 1;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data[] = array(
        'rowNum' => $rowNum,
        // sử dụng biến tự tăng để làm dữ liệu cột STT
        'product_id' => $row['product_id'],
        'product_name' => $row['product_name'],
        'Price' => $row['product_price'],
        'Quantity' => $row['qty'],
        'total_price' => $row['total_price'],

    );
    $rowNum++;
}
require_once('./inc/config.php');
require_once('./inc/helpers.php');


include('layouts/header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="sweet.js"></script>
<!-- bootstrap link -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- CDN: https://cdn.datatables.net/ -->
<!-- Datatables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- Datatables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<br>
<br><br><br><br><br>

<div class="row">

    <div class="vh-75 d-flex justify-content-center align-items-center">
        <div>
            <div class="mb-4 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75" fill="currentColor"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
            </div>
            <div class="text-center">
                <h1>Thank You !</h1>
                <p>We've send the link to your inbox. </p>
                <button class="btn btn-primary" onclick="location.href='index.php';" value="Home">Back Home</button>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <table id="myTable" class="table table-bordered table-hover p-2 mt-2">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Id Product</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td>
                            <?php echo $row['rowNum']; ?>
                        </td>
                        <td>
                            <?php echo $row['product_id']; ?>
                        </td>
                        <td>
                            <?php echo $row['product_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['Price']; ?>
                        </td>
                        <td>
                            <?php echo $row['Quantity']; ?>
                        </td>
                        <td>
                            <?php echo $row['total_price']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
                </div>
                </div>
    <?php include('layouts/footer.php'); ?>