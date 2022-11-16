<?php
    $_SESSION['title'] = "Seeds & Feeds | Farmer";
    include_once 'header.php';
?>
</section>
<script type='text/javascript' src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClL3XpKG_N2NuCvin3bAX11M8ZqEh-Fig"></script>
<main id='main'> 
    <section id="hero">
        <div class='hero-content'>
            <div>
                <h2>Find a Veterinarian</h2><br>
                <form id='vet-form' method='POST'>
                            <div id='map-wrapper'>
                                <div id="map" ></div>
                            </div>
                        <?php getVets(); ?>
                    <section class='vet-form'>
                        <div>
                            <label for='date'>Visit Date</label><br><br>
                            <label for='msg'>Message</label>
                        </div>
                        <div>
                            <input name='date' type="date" id="date" min="<?php echo date("Y-m-d"); ?>"><br><br>
                            <textarea name='msg' id='msg'></textarea>
                        </div>
                        <button type='submit' class='pri-button contact'>Contact</button>
                    </section>
                </form>
            </div>
        </div>
    </section>
</main><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include_once 'footer.php'; ?>