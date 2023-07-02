

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- style css link  -->
    <link rel="stylesheet" href="./style/style.css?v=<?php echo time(); ?>">
    <title>Shop</title>

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


    <!-- boxicon link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- meta data include -->

</head>

<body>
    <?php
    session_start();
    $_SESSION['page'] = 'gallery';
    require_once('./inc/config.php');
    require_once('./inc/helpers.php');

    $sql = "SELECT p.*,pdi.img,categorie.LoaiSp from products p
                    INNER JOIN product_images pdi ON pdi.product_id = p.id
                    INNER JOIN categorie ON categorie.id_categorie = p.id_categorie
                    WHERE pdi.is_featured = 1";
    $handle = $db->prepare($sql);
    $handle->execute();
    $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);

    include('layouts/header.php');
    ?>
    <div class="categorie-gallery">
        <?php
        // récupération de l'id de produit a partire de lien
        $id = $_GET['id'];
        error_log("------------------------------------------------------------------");
        //https://supportindeed.com/phpMyAdmin/signon.php?action=logout
        include "./style/admin/connection.php";


        // requette pour afficher la liste des CATEGORIE
        $sql = "SELECT * FROM categorie";
        $req = $conn->query($sql);
        if (mysqli_num_rows($req) == 0) {
            // 
        } else {
            ?>
            <div class="cat_box <?php if ($id == 0)
                echo 'active' ?>" style="justify-content: center;">
                    <a href="?id=0">
                        <h6>All</h6>
                    </a>
                </div>
                <?php
            while ($row = mysqli_fetch_assoc($req)) {
                ?>
                <div class="cat_box <?php if ($id == $row['id_categorie'])
                    echo 'active' ?>" style="justify-content: center;">
                        <a class="cat_type" href="?id=<?= $row['id_categorie'] ?>">
                        <?= $row['Icon'] ?>
                        <h6>
                            <?= $row['LoaiSp'] ?>
                        </h6>
                    </a>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <?php
    if ($id != 0) {
        $sql = "SELECT * FROM products WHERE products.id_categorie = $id;";
        $req = $conn->query($sql);
        $sql = "SELECT * FROM categorie WHERE id_categorie = $id;";
        $reQ = $conn->query($sql);
        if (mysqli_num_rows($reQ) == 0) {
            // 
        } else {
            $row = mysqli_fetch_assoc($reQ);
            ?>
            <div class="mainText" id="platType">
                <div class="add_prod">
                    <h2>
                        <?= $row['LoaiSp'] ?>
                    </h2>
                </div>
                <p>
                    <?= $row['MoTa'] ?>
                </p>
            </div>
            <div class="row">
                <?php
        }
    } else {
        $sql = "SELECT * FROM products";
        $req = $conn->query($sql);
        ?>
            <div class="mainText" id="platType">
                <div class="add_prod">
                    <h2>Sản Phẩm Của Chúng Tôi</h2>
                </div>
                <p>Bạn sẽ tìm thấy mọi thứ tại đây !</p>
            </div>
            <div class="row">
            <?php
    }
    if (mysqli_num_rows($req) == 0) {
        // 
    } else {
                foreach ($req as $product) {
                    $imgUrl = PRODUCT_IMG_URL . str_replace(' ', '-', strtolower($product['product_name'])) . "/" . $product['img'];
                    ?>
                    <div class="col-md-3 mt-2">
                        <div class="card">
                            <a href="single-product.php?product=<?php echo $product['id'] ?>">
                                <img class="card-img-top" src="<?php echo $imgUrl ?>"
                                    alt="<?php echo $product['product_name'] ?>">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="single-product.php?product=<?php echo $product['id'] ?>">
                                        <?php echo $product['product_name']; ?>
                                    </a>
                                </h5>
                                <strong>$
                                    <?php echo $product['price'] ?>
                                </strong>

                                <p class="card-t">
                                    <?php echo substr($product['short_description'], 0, 50) ?>'...
                                </p>
                                <p class="card-text">
                                    <a href="single-product.php?product=<?php echo $product['id'] ?>"
                                        class="btn btn-primary btn-sm">
                                        View
                                    </a>

                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
    }

    ?>
    </div>
    </div>
    </div>
    <?php include('layouts/footer.php'); ?>
</body>