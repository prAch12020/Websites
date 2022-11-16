<?php
    $title = "BAPS SHAYONA | MENU";
    $p = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    include('header.php');
?>
    <nav class="shortNav">
        <a href="index.php">HOME</a>
        <a class="active" href="menu.php">MENU</a>
        <a href="products.php">PRODUCTS</a>
        <a href="services.php">SERVICES</a>
        <?php require_once 'portal.php'; profile(); ?>
        <?php require_once 'data.php'; ?>
    </nav>
    <main class="menu">
        <div class="menu-items search">
            <form class="search-form" method="POST" action="">
                <input id="search-input" type="search" placeholder="Search for your favorite meal.." name="searchMenu">
                <button id='search-btn' type="submit" name='search'><i class="fa fa-search"></i></button>
            </form>
            <?php if(isset($_POST['search'])){ searchMenu(); } else{?>
        </div>
        <div class="div_img">
            <img class="mand" src="images/mand.png" width="100%">
        </div>
        <div class="menu-items">
            <section>
                <h3><?php getCat('SOUWER'); ?></h3>
                <div>
                    <?php getMenu('SOUWER'); ?>
                </div>
            </section>
            <section>
                <h3><?php getCat('CHIOAK'); ?></h3>
                <div>
                    <?php getMenu('CHIOAK'); ?>
                </div>
            </section>
            <section>
                <h3><?php getCat('CHABAH'); ?></h3>
                <div>
                    <?php getMenu('CHABAH'); ?>
                </div>
            </section>
            <section>
                <h3><?php getCat('SANLEI'); ?></h3>
                <div>
                    <?php getMenu('SANLEI'); ?>
                </div>
            </section>
            <section>
                <h3><?php getCat('BURWRA'); ?></h3>
                <div>
                    <?php getMenu('BURWRA'); ?>
                </div>
            </section>
            <section>
                <h3><?php getCat('PASHTS'); ?></h3>
                <div>
                    <?php getMenu('PASHTS'); ?>
                </div>
            </section>
            <section>
                <h3><?php getCat('WOOPIZ'); ?></h3>
                <div>
                    <?php getMenu('WOOPIZ'); ?>
                </div>
            </section>
            <section>
                <h3><?php getCat('CHISTA'); ?></h3>
                <div>
                    <?php getMenu('CHISTA'); ?>
                </div>
            </section>
            <section>
                <h3><?php getCat('CHIMAI'); ?></h3>
                <div>
                    <?php getMenu('CHIMAI'); ?>
                </div>
            </section>
            <section>
                <h3><?php getCat('SOUIND'); ?></h3>
                <div>
                    <?php getMenu('SOUIND'); ?>
                </div>
            </section>
            <section>
                <h3><?php getCat('INDSTA'); ?></h3>
                <div>
                    <?php getMenu('INDSTA'); ?>
                </div>
            </section>            
            <section>
                <h3><?php getCat('INDMAI'); ?></h3>
                <div>
                    <?php getMenu('INDMAI'); ?>
                </div>
            </section>
            <section>
                <h3><?php getCat('RICDIS'); ?></h3>
                <div>
                    <?php getMenu('RICDIS'); ?>
                </div>
            </section>
            <section>
                <h3><?php getCat('INDBRE')?></h3>
                <div>
                    <?php getMenu('INDBRE')?>
                </div>
            </section>
            <section>
                <h3><?php require_once 'data.php'; getCat('EXTDIE')?></h3>
                <div>
                    <?php require_once 'data.php'; getMenu('EXTDIE')?>
                </div>
            </section>
            <section>
                <h3><?php require_once 'data.php'; getCat('DESKCH')?></h3>
                <div>
                    <?php require_once 'data.php'; getMenu('DESKCH')?>
                </div>
            </section>
            <section>
                    <h3><?php require_once 'data.php'; getCat('BEVPOS')?></h3>
                    <div>
                    <?php require_once 'data.php'; getMenu('BEVPOS')?>
                </div>
            </section>
            <section>
                    <h3><?php require_once 'data.php'; getCat('HOTBEV')?></h3>
                    <div>
                        <?php require_once 'data.php'; getMenu('HOTBEV')?>
                    </div>
            </section>
            <section>
                    <h3><?php require_once 'data.php'; getCat('FREJUI')?></h3>
                    <div>
                        <?php require_once 'data.php'; getMenu('FREJUI')?>
                    </div>
            </section>
            <section>
                <h3><?php require_once 'data.php'; getCat('COLPRE')?></h3>
                <div>
                    <?php require_once 'data.php'; getMenu('COLPRE')?>
                </div>
            </section>
            <section>
                <h3><?php require_once 'data.php'; getCat('KEVMIL')?></h3>
                <div>
                    <?php require_once 'data.php'; getMenu('KEVMIL')?>
                </div>
            </section>
            <section>
                <h3><?php require_once 'data.php'; getCat('KEVTHI')?></h3>
                <div>
                    <?php require_once 'data.php'; getMenu('KEVTHI')?>
                </div>
            </section>
            <?php } ?>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>