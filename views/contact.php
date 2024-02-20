<section class="container-fluid" id="container__contact">
    <div class="row contact__row">
        <div class="col-xl-6 px-0 form__container--left">
            <div id="form__overlay">
                <div class="d-flex justify-content-center flex-wrap">
                    <p class="text-center py-4 w-100">
                        Vous avez eu un coup de coeur pour l’une de mes photos ? <br>
                        Vous êtes intéressé par un shooting ? <br>
                        Vous avez des questions ? <br> <br>
                        <span>N’hésitez pas, contactez-moi !</span>
                    </p>
                    <div id="form__pic" class="rounded-circle mb-3">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 px-0" id="form__container--right">
            <form method="post" action="/controllers/contact-ctrl.php">
                <div class="container__legend">
                    <h1 class="pt-4 text-center m-0 contact__legend">Formulaire de contact</h1>
                </div>
                <div class="container__form">
                    <div class="container__form--ball">
                        <div class="text-success text-center">
                            <?= $result ?? '' ?>
                        </div>
                        <!-- ! firstname -->
                        <div class="input-group pe-xl-3 ps-xl-3 px-1">
                            <label for="firstname"></label>
                            <span class="input-group-text" id="span__firstname"><i class="fa-solid fa-user"></i></span>
                            <input required type="text" name="firstname" id="firstname" placeholder="Prénom" autocomplete="given-name" minlength="2" maxlength="30" class="form-control" value="<?= $firstname ?? '' ?>">
                        </div>
                        <small class="text-danger ps-3"><?= $error['firstname'] ?? '' ?></small>
                        <!-- ! lastname -->
                        <div class="input-group pe-xl-3 ps-xl-3 px-1">
                            <label for="lastname"></label>
                            <span class="input-group-text" id="span__lastname"><i class="fa-solid fa-user-plus"></i></span>
                            <input required type="text" name="lastname" id="lastname" placeholder="Nom" autocomplete="family-name" minlength="2" maxlength="30" class="form-control" value="<?= $lastname ?? '' ?>">
                        </div>
                        <small class="text-danger ps-3"><?= $error['lastname'] ?? '' ?></small>
                        <!-- ! email -->
                        <div class="input-group pe-xl-3 ps-xl-3 px-1">
                            <label for="email"></label>
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input required type="email" name="email" id="email" placeholder="Adresse mail" class="form-control" value="<?= $email ?? '' ?>">
                        </div>
                        <small class="text-danger ps-3"><?= $error['email'] ?? '' ?></small>
                        <!-- ? mobile -->
                        <!-- <div class="input-group pe-xl-3 ps-xl-3 px-1">
                            <label for="mobile"></label>
                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                            <input type="text" name="mobile" id="mobile" placeholder="Numéro de téléphone" class="form-control" value="<?= $mobile ?? '' ?>">
                        </div>
                        <small class="text-danger ps-3"><?= $error['mobile'] ?? '' ?></small> -->
                        <!-- ! text -->
                        <div class="input-group pe-xl-3 ps-xl-3 px-1">
                            <label for="text"></label>
                            <span class="input-group-text"><i class="fa-solid fa-comment"></i></span>
                            <textarea required name="text" id="text" placeholder="Message" class="form-control"><?= $text ?? '' ?></textarea>
                        </div>
                        <small class="text-danger ps-3"><?= $error['text'] ?? '' ?></small>
                        <!-- ? captcha -->
                        <!-- <div class="input-group pe-xl-3 ps-xl-3 px-1">
                            <label for="captcha"></label>
                            <span class="input-group-text" id="span__captcha"><i class="fa-solid fa-robot"></i></span>
                            <input required type="number" name="captcha" id="captcha" placeholder="1 + 1 = ?" class="form-control">
                        </div> -->

                        <!-- ! Google captcha -->
                        <div class="g-recaptcha ps-xl-3" data-sitekey="6LdiXXkpAAAAAGMkQYRUBp8-4qEEx_E5v5yNHzbl"></div>
                        <small class="text-danger ps-3"><?= $error['captcha'] ?? '' ?></small>
                        <label for="consent" class="check__consent py-2">
                            <input type="checkbox" id="consent" name="consent" required>
                            En soumettant ce formulaire, j'accepte que des données saisies soient collectées dans le but de traiter ma demande. Voir les <a class="check__consent--link" target="_blank" href="/controllers/mentionslegales-ctrl.php">mentions légales</a>.
                        </label>
                        <small class="text-danger ps-3"><?= $error['consent'] ?? '' ?></small>
                    </div>
                    <!-- ! validation btn -->
                    <div class="text-center pt-3 pb-3 pt-xxl-3 mb-3 mb-lg-0">
                        <button id="contact__btn" class="btn btn-primary" type="submit" name="captchaOk">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>