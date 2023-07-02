<?php 
    session_start();
    $_SESSION['page'] = 'gallery';
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- style css link  -->
    <title>PlayTech - Shop</title>

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
<?php 
    require_once('./inc/config.php');    
    require_once('./inc/helpers.php');  
    
    if(isset($_GET['product']) && !empty($_GET['product']) && is_numeric($_GET['product']))
    {
        $sql = "SELECT p.*,pdi.img from products p
            INNER JOIN product_images pdi ON pdi.product_id = p.id WHERE pdi.is_featured =:featured AND p.id =:productID";
        $handle = $db->prepare($sql);
        $params = [
                ':featured'=>1,
                ':productID' =>$_GET['product'],
            ];
        $handle->execute($params);
        if($handle->rowCount() == 1 )
        {
            $getProductData = $handle->fetch(PDO::FETCH_ASSOC);
            $imgUrl = PRODUCT_IMG_URL.str_replace(' ','-',strtolower($getProductData ['product_name']))."/".$getProductData ['img'];
        }
        else
        {
            $error = '404! No record found';
        }

    }
    else
    {
        $error = '404! No record found';
    }

    if(isset($_POST['add_to_cart']) && $_POST['add_to_cart'] == 'add to cart')
    {
        $productID = intval($_POST['product_id']);
        $productQty = intval($_POST['product_qty']);
        
        $sql = "SELECT p.*,pdi.img from products p
            INNER JOIN product_images pdi ON pdi.product_id = p.id WHERE pdi.is_featured =:featured AND p.id =:productID";

        $prepare = $db->prepare($sql);
        
        $params = [
                ':featured'=>1,
                ':productID' =>$productID,
            ];
        
        $prepare->execute($params);
        $fetchProduct = $prepare->fetch(PDO::FETCH_ASSOC);

        $calculateTotalPrice = number_format($productQty * $fetchProduct['price'],2);
        
        $cartArray = [
            'product_id' =>$productID,
            'qty' => $productQty,
            'product_name' =>$fetchProduct['product_name'],
            'product_price' => $fetchProduct['price'],
            'total_price' => $calculateTotalPrice,
            'product_img' =>$fetchProduct['img']
        ];
        
        if(isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items']))
        {
            $productIDs = [];
            foreach($_SESSION['cart_items'] as $cartKey => $cartItem)
            {
                $productIDs[] = $cartItem['product_id'];
                if($cartItem['product_id'] == $productID)
                {
                    $_SESSION['cart_items'][$cartKey]['qty'] = $productQty;
                    $_SESSION['cart_items'][$cartKey]['total_price'] = $calculateTotalPrice;
                    break;
                }
            }

            if(!in_array($productID,$productIDs))
            {
                $_SESSION['cart_items'][]= $cartArray;
            }

            $successMsg = true;
            
        }
        else
        {
            $_SESSION['cart_items'][]= $cartArray;
            $successMsg = true;
        }

    }
	
include('layouts/header.php');

?>

    <?php if(isset($getProductData) && is_array($getProductData)){?>
        <?php if(isset($successMsg) && $successMsg == true){?>
            <div class="row">
                <div class="col-md-12">
                <br><br><br>
                    <div class="alert alert-success alert-dismissible">
                         <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <img src="<?php echo $imgUrl ?>" class="rounded img-thumbnail mr-2" style="width:40px;"><?php echo $getProductData['product_name']?> is added to cart. <a href="cart.php" class="alert-link">View Cart</a>
                    </div>
                </div>
            </div>
         <?php }?>
         <br><br><br>
        <div class="row">
            <div class="col-md-5">
                <img src="<?php echo $imgUrl;?>" style="width:400px;">
            </div>
            <div class="col-md-7">
                <h1><?php echo $getProductData['product_name']?></h1>
                <p><?php echo $getProductData['short_description']?></p>
                <h4>$<?php echo $getProductData['price']?></h4>
                
                <form class="form-inline" method="POST">
                    <div class="form-group mb-2">
                        <input type="number" name="product_qty" id="productQty" class="form-control" placeholder="Quantity" min="1" max="1000" value="1">
                        <input type="hidden" name="product_id" value="<?php echo $getProductData['id']?>">
                    </div>
                    <div class="form-group mb-2 ml-2">
                        <button type="submit" class="btn btn-primary" name="add_to_cart" value="add to cart">Add to Cart</button>
                    </div>
                </form>
                
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <?php echo $getProductData['full_description']?>
            </div>
        </div>

    <?php
    }
    ?>
</div>
<?php include('layouts/footer.php');?>