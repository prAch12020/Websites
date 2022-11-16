<?php 
    require_once 'config.php';
    $file = getPage();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link href="../../assets/vendor/jsuites/jsuites.css" rel="stylesheet"/>

    
    <link href="../css/styles7.css" rel="stylesheet">
    <!--link href="../css/style2.css" rel="stylesheet">
    <link href='../css/templates.css' rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href='../css/product_category.css' rel="stylesheet">
    <link href='../css/avechi1.css' rel="stylesheet"> 
    <link href='../css/shopping_cart.css' rel="stylesheet">	
    <link href='../css/styles.css' rel="stylesheet"-->
    <title>AVECHI | <?php echo strtoupper($file); ?></title>
</head>
<body>
        <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo"><a href="index.php"><img id='logo' src='../../images/logo.png'></a></h1>
            <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" id='home' href="index.php">Home</a></li>
                <li class="dropdown"><a class="nav-link scrollto" id='shop' href="products.php">Shop<i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li>&nbsp;Categories</li>
                    <li><a href="products.php#div1">Smartphones</a></li>
                    <li><a href="products.php#div2">Phone accessories</a></li>
                    <li><a href="products.php#div3">TVs</a></li>
                    <li><a href="products.php#div4">Audio</a></li>
                    <li><a href="products.php#div5">Cookers</a></li>
                    <li><a href="products.php#div6">Fridges</a></li>
                    <li><a href="products.php#div7">Kitchen appliances</a></li>
                    <li><a href="products.php#div8">Home appliances</a></li>
                    <li><a href="products.php#div9">Laptops</a></li>
                    <li><a href="products.php#div10">Computers</a></li>
                    <li><a href="products.php#div11">Tablets</a></li>
                    <li><a href="products.php#div11">Office appliances</a></li>
                    <li><a href="products.php#div12">Cameras</a></li>
                    <li><a href="products.php#div13">Camera accessories</a></li>
                    <li><a href="products.php#div14">Tv accessories</a></li>
                </ul>
                </li>
                <?php 
                    if(!loggedIn()){
                ?>
                <li><a class="getstarted scrollto" href="login.php">Login</a></li>
                <li><a class="getstarted scrollto" href="signup.php">Registration</a></li>
                <?php
                    }
                    else{
                        if($_SESSION['role_id'] == 1){ ?>
                            <li><a id='basket' href="basket.php" title='My Basket'><span class="material-icons">shopping_basket</span></a></li>
                            <li><a id='wishlist' href="wishlist.php" title='My Wishlist'><span class="material-icons">favorite_border</span></a></li>
                        <?php } else if($_SESSION['role_id'] == 2){ ?>
                            <li><a  class="nav-link scrollto" id='dashboard' href="admin_dashboard.php"><span class="material-icons">dashboard</span>&nbsp;Dashboard</a></li>
                        <?php }
                ?>
                <li class="dropdown"><a class="nav-link getstarted scrollto" href="#"><?php echo $_SESSION['firstname'];?><i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
                </li>
                <?php } ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <?php 
                    if($file == 'index'){        
                        echo "<script>document.getElementById('home').classList.add('active');</script>";
                    }
                    if($file== 'about'){
                        echo "<script>document.getElementById('about').classList.add('active');</script>";
                    }
                    if($file == 'products'){
                        echo "<script>document.getElementById('shop').classList.add('active');</script>";
                    }
                    if($file == 'admin_dashboard'){
                        echo "<script>document.getElementById('dashboard').classList.add('active');</script>";
                    }
                    if($file == 'basket'){        
                        echo "<script>document.getElementById('basket').classList.add('active');</script>";
                    }
                    if($file== 'wishlist'){
                        echo "<script>document.getElementById('wishlist').classList.add('active');</script>";
                    }
            ?>
        </div>
        </header>