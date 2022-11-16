<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This website is of a pure vegetarian restaurant named BAPS SHAYONA">
    <meta name="keywords" content="pure veg restaurant, vegetarian restaurant, restaurants in nairobi, restaurants in kenya, indian cuisine, BAPS Shayona">
    <meta name="author" content="Prachi Jayeshkumar Patel">
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>BAPS SHAYONA</title>
</head>
<body>
    <header>
        <h1 class="title"> <a href="index.php"><img src="./images/logo.png" height="80%" width="25%" alt="logo"></a> <span> Saatvik Vegetarian Food </span></h1>
        <section>
            <div class="skewed1"></div>
            <div class="skewed2"></div>
            <div class="skewed3"></div>
        </section>
        <div class="icons">
            <a href="https://www.facebook.com/" target="_blank" title="Facebook"> <img src="images/facebook.png" height="32%" width="52%" alt="social media facebook icon"></a>
            <a href="https://wa.link/qlc4zx" target="_blank" title="WhatsApp"><img src="images/whatsapp.png" height="32%" width="52%" alt="social media whatsapp icon"></a>
            <a href="https://www.instagram.com/" target="_blank" title="Instagram"><img src="images/instagram.png" height="32%" width="52%" alt="social media instagram icon"></a>
        </div>
        <section class="order">
            <h1>CRAVING FOR DELICACIES? <br> <br><span class="wait">You've come to the right place!</span><br> 
                <span class="desc">BAPS Shayona offers diverse cuisines <br>
                from Indian to Italian to Chinese and much more</span><br> <br> <?php require_once 'portal.php'; linksToDisplay(); ?></h1>
            <!--Will be dynamic-->
        <div class="carousel">
            <div class="images">
                <img height="250px" width="100%" src="images/41.jpg">
            </div>
            <div class="images">
                <img height="250px" width="100%" src="images/12.jpg">
            </div>
            <div class="images">
                <img height="250px" width="100%" src="images/38.jpg">
            </div>
            <div class="images">
                <img height="250px" width="100%" src="images/15.jpg">
            </div>
            <div class="images">
                <img height="250px" width="100%" src="images/39.jpg">
            </div>
            <div class="images">
                <img height="250px" width="100%" src="images/47.jpg">
            </div>
            <div class="images">
                <img height="250px" width="100%" src="images/32.jpg">
            </div>
        </div>
        </section>
    </header>
    <nav>
        <a class="active" href="index.php">HOME</a>
        <a href="menu.php">MENU</a>
        <a href="products.php">PRODUCTS</a>
        <a href="services.php">SERVICES</a>
        <?php 
            if(isset($_SESSION["UserId"])){
                require_once 'portal.php'; profile();
            } 
        ?>
        
    </nav>
    <main>       
        <section class="about">
            <div>
                <img src="images/no onion.png" height="50%" width="45%"><br><br>
                <br><br>
                <h4> Wish to know more? <a target="_blank" href="https://ketulchauhan.medium.com/sattvik-kitchen-a-food-for-life-2617344c2538"> Check out this article by Ketul Chauhan</a> </h4>
            </div>
            <div>
                <span> What is Saatvik Food? </span>
                <p>Sattvik food is basically pure vegetarian food without any use of Onion, Garlic or eggs. Onion and Garlic are Tamasik and for those who want to attain salvation (Moksha) prefer Sattvik Diet to excel on the path to Moksha.</p> 
                <br>
                <span> Why No Onion No Garlic?</span>
                <p> Onion and garlic belong to the genus allium whose sulfur-based defence systems give them their distinctive flavours. The sulphur chemicals cause irritation. They can kill microbes and repel insects. They damage the red blood cells of dogs and cats. They produce a sulfur molecule that is small and light enough to launch itself from the damaged tissue, fly through the air and attack our eyes and nasal passages.</p>
                <br>
                <blockquote> "Well, we didn’t know why for 20 years later, until I owned the Alpha-Metrics Corporation. We were building biofeedback equipment and found out that garlic usually desynchronizes your brain waves" <br><br><span class="author">--Dr. Robert [Bob] C. Beck, DSc.</span> </blockquote>
            </div>
            </section>
        <section class="products">
            <h3>Explore our snacks</h3>
            <!--Images in the div will be parallax-->
            <div>
                <img src="images/2.png" height="15%" width="15%">
                <p><span>Freshly baked bread </span><br>
                Shayona provides breads ranging from, white to brown to multigrain, to suit your health and taste needs.
                </p>
            </div>
            <div class="right">
                <p><span>Kenya Chevda </span><br> 
                Snack mix made from Kenyan potatoes, lentils and Indian spices.</p>
                <img src="images/13.png" height="20%" width="20%">
            </div>
            <div>
                <img src="images/14.png" height="20%" width="20%">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Potato Crisps </span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Want masala on your potatoes? Or just salt... <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shayona brings to you everyone's favorite potato crisps flavored with either salt or masala. Whatever &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;you need.
                </p>
            </div>
            <div class="right">
                <p><span>Chocolate Biscuits </span><br>
                Dipped in chocolate, straight out of the oven.</p>
                <img src="images/6.png" height="20%" width="20%">
            </div>
            <a href="products.php">View more products</a>
        </section>
        <section class="services">
            <div> 
                <p> <br> <span> Catering </span> <br>
                    We cater for any event for atleast 10 people and atmost 1000 people.
                    <a href="services.php">Contact us</a> to get a quote. 
                </p>
                <p> <br><span> Tiffin Services </span> <br>
                    We provide tiffin services for either lunch, dinner or both. 
                </p>
                <p> <br><span> Birthday Events </span> <br>
                    We host birthday parties in our premises as well as cater for the menu and decorations.
               </p>
            </div>
            <div>
                <a href="services.php">Learn more</a>
            </div>
        </section>
        <section class="gallery">
            <h3>Gallery</h3>
                <img src="images/48.jpg">
                <img src="images/18.jpg">
                <img src="images/27.jpg">
                <img src="images/19.jpg">
                <img src="images/44.jpg">
                <img src="images/34.jpg">
                <img src="images/17.jpg">
                <img src="images/1.jpg">
                <img src="images/20.jpg">
                <img src="images/21.jpg" width="15%">
                <img src="images/37.jpg">
                <img src="images/36.jpg">
                <img src="images/28.jpg">
                <img src="images/43.jpg">
                <img src="images/7.jpg">
                <img src="images/29.jpg">
                <img src="images/30.jpg">
                <img src="images/33.jpg">
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>