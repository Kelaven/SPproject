</main>


<?php
if (isset($footer)) {
?>
    <footer>
        FOOTER
    </footer>
<?php } ?>


<!-- font awesome -->
<script src="https://kit.fontawesome.com/dce61209e7.js" crossorigin="anonymous"></script>
<!-- bootstrap script CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
if(isset($portfolioScript)){ // for portfolio (paysages & portraits)
?>
<script src="/public/assets/js/portfolio.js"></script>
<?php } ?>
<?php
if(isset($pagesScript)){ // for pages (without home)
?>
<script src="/public/assets/js/pages.js"></script>
<?php } ?>

</body>

</html>