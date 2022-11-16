<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $_SESSION['title']; ?></title>
        <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link rel='stylesheet' href='../../assets/css/style.css?v=<?php echo time(); ?>'>
    </head>
    <body>
    <div id='formpage' class='formdiv'></div>
    <section class='back glass-back1 back-popup'>
        <header class='glass'>
            <a href='index.php'><img src='../../assets/images/log1.png' height="150px" width="180px" alt="logo"></a>
            <nav class='navbar'>
                <ul>
                <?php require_once 'data/config.php';
                if(isLoggedIn()){ 
                    if($_SESSION['role_id'] == 0){ ?>
                        <li><a href='farmer.php'>Buy Inputs</a></li>
                        <li><a href='sell_produce.php'>Sell Produce</a></li>
                        <li><a href='contact_vet.php'>Contact Veterinarian</a></li>
                        <li title='My Trolley'><a href='trolley.php'><span class='material-symbols-outlined'>shopping_cart</span></a></li>
                        <li title='My Previous Orders'><a href='orders.php'><span class='material-symbols-outlined'>inventory</span></a></li>
                    <?php } else if($_SESSION['role_id'] == 1){ ?>
                        <li><a href='seller.php'>Inputs</a></li>
                        <li><a href='sell_orders.php'>Orders</a></li>
                    <?php } else if($_SESSION['role_id'] == 2){ ?>
                        <li><a href='buyer.php'>Products</a></li>
                        <li><a href='cart.php'>My Trolley</a></li>
                        <li><a href='buy_orders.php'>My Orders</a></li>
                    <?php } else if($_SESSION['role_id'] == 3){ ?>
                        <li><a href='vet.php'>Requests</a></li>
                    <?php } else if($_SESSION['role_id'] == 4){ ?>
                        <li><a href='admin.php'>Dashboard</a></li>
                    <?php } ?>
                    <!--User Name-->
                    <li class="dropdown"><a href="#"><span class='material-symbols-outlined'>account_circle</span>&nbsp;<?php echo $_SESSION['name']; ?>&nbsp;
                        <i class="bi bi-chevron-down"></i></a>
                        <ul><?php if($_SESSION['role_id'] == 0){?>
                            <li><a href="track.php"><span class='material-symbols-outlined'>manage_accounts</span>Track Profits</a></li>
                           <?php } ?> <li><a href="data/logout.php"><span class='material-symbols-outlined'>logout</span>Log Out</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li><a href='index.php'>HOME</a></li>
                    <li><a href='services.php'>SERVICES</a></li>
                    <li><a onclick='openPage("sign")'>SIGN UP</a></li>
                    <li><a onclick='openPage("log")'>LOG IN</a></li>
                <?php } ?>
                </ul>
            </nav>
        </header>