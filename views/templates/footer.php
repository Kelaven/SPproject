</main>


<?php
if (isset($footer)) {
?>
    <footer>
        <div class="container footer__container">
            <div class="row align-content-center">
                <div class="col text-center py-3">
                    <div class="cursor--pages--dyes"></div>
                    <a class="footer__mentionslegales" target="_blank" href="/controllers/mentionslegales-ctrl.php">Mentions légales</a>
                    <div class="cursor--pages--dnone"></div>
                </div>
            </div>
        </div>
    </footer>
<?php } ?>


<!-- font awesome -->
<script src="https://kit.fontawesome.com/dce61209e7.js" crossorigin="anonymous"></script>
<!-- bootstrap script CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php
foreach ($scripts as $script) {
    echo '<script src="/public/assets/js/' . $script . '"></script>';
}
?>

<!-- GSAP CDN -->
<?php
if (isset($gsapCDN)) { // for homepage
?>
    <script src="https://unpkg.com/gsap@3.12.4/dist/TextPlugin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js"></script>
<?php } ?>
<!-- google captcha CDN -->
<?php
if (isset($captchaScript)) {
?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php } ?>
<!-- my script -->
<?php
if (isset($gsapSelectionScript)) { // for selection GSAP
?>
    <script src="/public/assets/js/selectiongsap.js"></script>
<?php } ?>


</body>

</html>