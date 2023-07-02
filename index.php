<?php
session_start();
$_SESSION['page'] = 'home';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- style css link  -->
    <link rel="stylesheet" href="./style/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./style/animation.css?v=<?php echo time(); ?>">
    <title>PlayTech - Home</title>

    <!-- google font  link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:ital,wght@0,100;0,200;0,300;1,300;1,400;1,800;1,900&display=swap" rel="stylesheet">

    <!-- font awesome link "icone" -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- boxicon link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!-- bootstrap link -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- meta data include -->

</head>

<body>
    <!-- header (nav bar) -->
    <?php
    include_once "layouts/header.php"
    ?>
    </div>
    <section class="banner" id="intro">
        <main class="home">
            <div class="home-text">
                <h1>GAMING <br>STORE</h1>
                <h5>Safety - Quality - Prestige</h5>
                <a href="./gallery.php?id=0" class="home-btn">Shop Now</a>
            </div>
            <div class="home-img">
                <img src="./assets/product-images/6.png" alt="">
            </div>
        </main>
    </section>


    <section id="feature">
        <div class="fe-box">
            <img src="./assets/product-images/feature/free-shipping.png" alt="image">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="./assets/product-images/feature/24-7.png" alt="image">
            <h6>24/7 support</h6>
        </div>
        <div class="fe-box">
            <img src="./assets/product-images/feature/save-money.png" alt="image">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="./assets/product-images/feature/mobile-order.png" alt="image">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="./assets/product-images/feature/promotions.png" alt="image">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="./assets/product-images/feature/happy.png" alt="image">
            <h6>Happy Sell</h6>
        </div>
    </section>

    <div class="mainToContact">

        <div class="blabla">
            <h2>Listen to customers to understand yourself better.</h2>
            <a href="./contact.php"><button>contact</button></a>
        </div>
        <div class="manadger">
            <img src="./assets/product-images/Ran.png" alt="">
        </div>
    </div>


    <a href="#intro" class="sctrooL">
        <i class='bx bxs-up-arrow-circle bx-md'></i>
    </a>
    <?php
    include_once "layouts/footer.php"
    ?>
    <?php
    include_once "layouts/script.php"
    ?>
</body>

</html>