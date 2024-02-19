</main>


<?php
if (isset($footer)) {
?>
    <footer>
        <div class="container footer__container">
            <div class="row align-content-center">
                <div class="col text-center py-3">
                    <a class="footer__mentionslegales" target="_blank" href="/controllers/mentionslegales-ctrl.php">Mentions légales</a>
                </div>
            </div>
        </div>
    </footer>
<?php } ?>


<!-- font awesome -->
<script src="https://kit.fontawesome.com/dce61209e7.js" crossorigin="anonymous"></script>
<!-- bootstrap script CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- mon script -->
<script src="/public/assets/js/dashboard.js"></script>
<!-- GSAP CDN -->
<?php
if(isset($gsapCDN)){ // for homepage
?>
<script src="https://unpkg.com/gsap@3.12.4/dist/TextPlugin.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js"></script>
<?php } ?>
<!-- my script -->
<?php
if(isset($homeScript)){ // for homepage
?>
<script src="/public/assets/js/script.js"></script>
<?php } ?>
<?php
if(isset($signupScript)){ // to connect at galeries
?>
<script src="/public/assets/js/signup.js"></script>
<?php } ?>
<?php
if(isset($accesclientformScript)){ // to connect at galeries
?>
<script src="/public/assets/js/accesclientform.js"></script>
<?php } ?>
<?php
if(isset($gallerypicturesScript)){ // to connect at galeries
?>
<script src="/public/assets/js/gallerypictures.js"></script>
<?php } ?>
<?php
if(isset($portfolioScript)){ // for portfolio (paysages & portraits)
?>
<script src="/public/assets/js/portfolio.js"></script>
<?php } ?>
<?php
if(isset($pagesScript)){ // for pages (without home)
?>
<script src="/public/assets/js/pages.js"></script>
<?php } ?>
<?php
if(isset($gsapSelectionScript)){ // for selection GSAP
?>
<script src="/public/assets/js/selectiongsap.js"></script>
<?php } ?>


</body>

</html>