<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop bán hàng NetaShop</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <!-- Main content -->
    <div class="container">
        <h1>Form Add New Product</h1>

        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Product's name</td>
                    <td><input type="text" name="product_name" id="product_name" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Product Type</td>
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
                    </select></td>
                </tr>
                <tr>
                    <td>Note</td>
                    <td><textarea name="short_description" id="short_description" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" name="price" id="price" class="form-control" /></td>
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
include "../style/admin/connection.php";


    if (isset($_POST['btnSave'])) {

        $product_name = $_POST['product_name'];
        $id_categorie = $_POST['id_categorie'];
        $short_description = $_POST['short_description'];
        $price = $_POST['price'];
        $created_at = date('Y-m-d H:i:s'); 
        $updated_at = NULL;

        $errors = [];


        if (empty($product_name)) {
            $errors['product_name'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $product_name,
                'msg' => 'Please enter product name'
            ];
        }
        if (!empty($product_name) && strlen($product_name) < 3) {
            $errors['supplier_code'][] = [
                'rule' => 'minlength',
                'rule_value' => 3,
                'value' => $product_name,
                'msg' => 'Product Name must have at least 3 characters'
            ];
        }
        if (!empty($product_name) && strlen($product_name) > 50) {
            $errors['product_name'][] = [
                'rule' => 'maxlength',
                'rule_value' => 50,
                'value' => $product_name,
                'msg' => 'Product Name cannot exceed 50 characters'
            ];
        }

        if (!empty($errors)) {
            foreach ($errors as $errorField) {
                foreach ($errorField as $error) {
                    echo $error['msg'] . '<br />';
                }
            }
            return;
        }

        // 6. Nếu không có lỗi dữ liệu sẽ thực thi câu lệnh SQL
        // INSERT
        $sqlInsert = <<<EOT
        INSERT INTO products (id_categorie, product_name, short_description, price, created_at, updated_at) 
        VALUES ('$id_categorie', '$product_name', '$short_description', '$price', '$created_at', '$updated_at')
EOT;

    
        // Thực thi INSERT
        mysqli_query($conn, $sqlInsert);

        // Close
        mysqli_close($conn);

        header('location:../gestion.php');
    }
    ?>

    <!-- JS Jquery-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>

    <!-- JS Popper-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

    <!-- JS Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <!-- JS FontAwesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>

</html>