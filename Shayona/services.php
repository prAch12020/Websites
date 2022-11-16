<?php
    $title = "BAPS SHAYONA | SERVICES";
    $p = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    include('header.php');
?>
    <nav class="shortNav">
        <a href="index.php">HOME</a>
        <a href="menu.php">MENU</a>
        <a href="products.php">PRODUCTS</a>
        <a class="active" href="services.php">SERVICES</a>
        <?php require_once 'portal.php'; profile(); ?>
    </nav>
    <main class="serv">
        <section class="service">
            <p>Shayona offers catering services for any occasion at affordable prices as well as provide Gujarati Thali tiffin services. Cake, decorations and dinner are all catered for during birthday parties.
            <a href="#cater-form">Get a quote now</a>. </p>
        </section>
        <section id="cater-form" class="cater">
            <div> <img src="images/27.jfif"> <h2> SHAYONA </h2></div>
            <form method="POST" class="cater-form">
                <label>Name</label>
                    <input required type="name" name="name">
                <label>Mobile Number</label>
                    <input required type="tel" name="phone">
                <label>Cater For</label>
                    <select required name="cater-for">
                        <option>Conference</option>
                        <option>Birthday</option>
                        <option>Engagement</option>
                        <option>Wedding</option>
                        <option>Other</option>
                    </select> 
                <label>Number of People</label>
                    <input required type="number" name="num" min=10>
                <label>Order</label>
                    <textarea required name="order" placeholder="Type your order"></textarea>
                <label>Date</label>
                    <input required type="date" name="date">
                <label>Time</label>
                    <input required type="time" name="time">
                <hr>
                <button type="submit" name="cater" class="button1">SUBMIT</button>
            </form>
        </section>
        <?php 
            if(isset($_POST['cater'])){
                $sql = "INSERT INTO `services`(`Name`, `Mobile`, `Cater`, `People`, `Orders`, `Date`, `Time`, `Contacted`) VALUES ('$_POST[name]','$_POST[phone]','" .$_POST["cater-for"]. "','$_POST[num]','$_POST[order]', '$_POST[date]','$_POST[time]', 'NO')";
                insert($sql, "<script>alert('Your catering query has been submitted. Our staff will be in contact with you within 24 hours.');</script>");
            }
        ?>            
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>