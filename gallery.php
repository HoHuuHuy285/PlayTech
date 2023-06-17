<?php


session_start();
$_SESSION['page'] = 'gallery';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- style css link  -->
    <link rel="stylesheet" href="./style/style.css?v=<?php echo time(); ?>">
    <title>PlayTech - Shop</title>

    <!-- google font  link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:ital,wght@0,100;0,200;0,300;1,300;1,400;1,800;1,900&display=swap" rel="stylesheet">

    <!-- font awesome link "icone" -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- boxicon link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- meta data include -->

</head>

<body>
<style>


        h1 {
            text-align: center;
        }

        ul.list-product {
            list-style: none;
            padding: 0;
            display: flex;
            text-align: center;
            /*  làm cho xuống hàng */
            flex-wrap: wrap;
            justify-content: space-between;
            position: relative;
        }

        ul.list-product li {
            flex-basis: 33.33%;
            padding-left: 15px;
            padding-right: 15px;
            margin-bottom: 30px;
        }

        ul.list-product .product-item {
            border: 1px solid #333;
        }


        .price {
            color: orange;
            margin-bottom: 10px;
            font-size: 20px;

        }

        .product-name {
            text-decoration: none;
        }

        .buy-now {
            display: flex;
            flex-direction: column;
            color: red;
            margin-bottom: 10px;
            text-decoration: none;
        }
        #wrapper p{
            padding: 80px;
            font-size:38px;
            font-weight:bold;

        }
        .product-item img{
            height: 300px;
    width: 473px;
    transition: all 1.2s ease-out 0s;
        }
        .product-item img:hover{
            transform: scale(0.8,0.8);
    transition: all 1.2s ease-out 0s;
        }

    </style> 
    <!-- header (nav bar) -->
    <?php
    include_once "./component/header.php"
    ?>


    <div id="wrapper">
        <p>Keyboard</p>
        <ul class="list-product">
            
            <li>
                <div class="product-item">
                    <a href="">
                        <img src="image/gallery-img/image-22@2x.png" alt="" >
                    </a>
                    <div class="price">499.000</div>
                    <a href="" class="product-name">Lorem ipsum dolor sit amet.</a>
                    <a href="" class="buy-now">Mua ngay</a>
                    
                </div>

            </li>
            <li>
                <div class="product-item">
                    <div class="product-item">
                        <a href="">
                        <img src="image/gallery-img/img-2.png" alt="" >
                        </a>
                        <div class="price">499.000</div>
                        <a href="" class="product-name">Lorem ipsum dolor sit amet.</a>
                        <a href="" class="buy-now">Mua ngay</a>


                    </div>

            </li>
            <li>
                <div class="product-item">
                    <div class="product-item">
                        <a href="">
                        <img src="image/gallery-img/img-3.png" alt="" >
                        </a>
                        <div class="price">499.000</div>
                        <a href="" class="product-name">Lorem ipsum dolor sit amet.</a>
                        <a href="" class="buy-now">Mua ngay</a>

                    </div>

            </li>
            <li>
                <div class="product-item">
                    <div class="product-item">
                        <a href="">
                        <img src="image/gallery-img/img-4.png" alt="" >
                        </a>
                        <div class="price">499.000</div>
                        <a href="" class="product-name">Lorem ipsum dolor sit amet.</a>
                        <a href="" class="buy-now">Mua ngay</a>
                        

                    </div>

            </li>
            <li>
                <div class="product-item">
                    <div class="product-item">
                        <a href="">
                        <img src="image/gallery-img/image-24@2x.png" alt="" >
                        </a>
                        <div class="price">499.000</div>
                        <a href="" class="product-name">Lorem ipsum dolor sit amet.</a>
                        <a href="" class="buy-now">Mua ngay</a>


                    </div>

            </li>
            <li>
                <div class="product-item">
                    <div class="product-item">
                    <img src="image/gallery-img/image-22@2x.png" alt="" >
                        </a>
                        <div class="price">499.000</div>
                        <a href="" class="product-name">Lorem ipsum dolor sit amet.</a>
                        <a href="" class="buy-now">Mua ngay</a>

                    </div>

            </li>
        </ul>
    </div>
    
    <?php
    include_once "./component/footer.php";

    include_once "./component/script.php";
    ?>
</body>

</html>