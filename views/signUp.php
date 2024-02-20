<!-- form pour ajouter un nouveau client : ID, PWD, confirmation PWD -->
<section class="container" id="signup__container">
    <div class="row pt-1 pb-3 justify-content-center">
        <div class="col-12 pt-3">
            <div class="card card__sign mb-5 mb-xl-0">
                <div class="text-success text-center fs-6 fw-bold pb-1">
                    <?= $result ?? '' ?>
                </div>
                <form method="POST" class="px-2" novalidate>
                    <h1 class="py-4 px-3 text-center contact__legend">Créer un compte</h1>
                    <div class="row w-100 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-danger text-center">
                                <?= $error['existEmail'] ?? '' ?>
                            </div>
                            <!-- ! firstname -->
                            <div class="input-group pe-xl-3 ps-xl-3 px-1">
                                <label for="firstname"></label>
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <input required type="text" name="firstname" id="firstname" placeholder="Prénom" minlength="2" maxlength="30" class="form-control" value="<?= $firstname ?? '' ?>">
                            </div>
                            <small class="text-danger ps-3"><?= $error['firstname'] ?? '' ?></small>
                            <!-- ! lastname -->
                            <div class="input-group pe-xl-3 ps-xl-3 px-1">
                                <label for="lastname"></label>
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <input required type="text" name="lastname" id="lastname" placeholder="Nom" minlength="2" maxlength="30" class="form-control" value="<?= $lastname ?? '' ?>">
                            </div>
                            <small class="text-danger ps-3"><?= $error['lastname'] ?? '' ?></small>
                            <!-- ! email -->
                            <div class="input-group pe-xl-3 ps-xl-3 px-1">
                                <label for="email"></label>
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <input required type="email" name="email" id="email" placeholder="Adresse mail" class="form-control" value="<?= $email ?? '' ?>">
                            </div>
                            <small class="text-danger ps-3"><?= $error['email'] ?? '' ?></small>
                            <!-- mobile -->
                            <div class="input-group pe-xl-3 ps-xl-3 px-1">
                                <label for="mobile"></label>
                                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                <input required type="text" name="mobile" id="mobile" placeholder="Numéro de téléphone" class="form-control" value="<?= $mobile ?? '' ?>">
                            </div>
                            <small class="text-danger ps-3"><?= $error['mobile'] ?? '' ?></small>
                        </div>
                        <div class="col-lg-6">
                            <div class="text-danger text-center">
                                <?= $error['existUsername'] ?? '' ?>
                            </div>
                            <!-- ! username -->
                            <div class="input-group pe-xl-3 ps-xl-3 px-1">
                                <label for="username"></label>
                                <span class="input-group-text" id="span__username"><i class="fa-solid fa-user-plus"></i></span>
                                <input required type="text" name="username" id="username" placeholder="Pseudonyme" minlength="2" maxlength="30" class="form-control" value="<?= $username ?? '' ?>">
                            </div>
                            <small class="text-danger ps-3"><?= $error['username'] ?? '' ?></small>
                            <!-- ! password -->
                            <div class="input-group pe-xl-3 ps-xl-3 px-1">
                                <span class="field__rsz input-group-text span__password"><i class="fa-solid fa-key"></i></span>
                                <input required type="password" name="password" id="password" placeholder="Mot de passe" minlength="8" maxlength="30" class="field__rsz form-control password__inputs" pattern="<?= REGEX_PASSWORD ?>" autocomplete="new-password">
                                <span class="input-group-text span__signup__pwd--eye"><i class="fa-solid fa-eye" id="pwd-eye"></i><i class="fa-solid fa-eye-slash d-none" id="pwd-eye-slash"></i></span>
                            </div>
                            <div id="nudge">
                                <span class="badge ms-1 ms-xl-3 text-bg-danger d-none">Faible</span>
                                <span class="badge ms-1 ms-xl-3 text-bg-warning d-none">Moyen</span>
                                <span class="badge ms-1 ms-xl-3 text-bg-success d-none">Fort</span>
                            </div>
                            <small class="text-danger ps-3"><?= $error['password'] ?? '' ?></small>
                            <!-- ! password check -->
                            <div class="input-group pe-xl-3 ps-xl-3 px-1">
                                <label for="passwordCheck">
                                </label>
                                <span class="field__rsz input-group-text span__password"><i class="fa-solid fa-key"></i></span>
                                <input required type="password" name="passwordCheck" id="passwordCheck" placeholder="Confirmez le mot de passe" autocomplete="given-name" minlength="8" maxlength="30" class="field__rsz form-control password__inputs" pattern="<?= REGEX_PASSWORD ?>">
                                <span class="input-group-text span__signup__pwd--eye"><i class="fa-solid fa-eye" id="pwd-eye-check"></i><i class="fa-solid fa-eye-slash d-none" id="pwd-eye-slash-check"></i></span>
                            </div>
                            <small class="text-danger ps-3"><?= $error['password'] ?? '' ?></small>
                            <!-- ? captcha -->
                            <div class="input-group pe-xl-3 ps-xl-3 px-1">
                                <label for="captcha"></label>
                                <span class="field__rsz input-group-text" id="span__captcha"><i class="fa-solid fa-robot"></i></span>
                                <input required type="number" name="captcha" id="captcha" placeholder="1 + 1 = ?" class="field__rsz form-control">
                            </div>
                            <small class="text-danger ps-3"><?= $error['captcha'] ?? '' ?></small>
                        </div>
                        <!-- ! Google captcha -->
                        <div class="g-recaptcha ps-xl-3 d-flex justify-content-center" data-sitekey="6LdiXXkpAAAAAGMkQYRUBp8-4qEEx_E5v5yNHzbl"></div>
                        <small class="text-danger ps-3 text-center"><?= $error['captchaGoogle'] ?? '' ?></small>
                        <!-- consent -->
                        <label for="consent" class="check__consent py-2 ps-4 ms-xl-1">
                            <input type="checkbox" id="consent" name="consent" required>
                            En soumettant ce formulaire, j'accepte que des données saisies soient collectées dans un but fonctionnel. Voir les <a class="check__consent--link" target="_blank" href="/controllers/mentionslegales-ctrl.php">mentions légales</a>.
                        </label>
                        <small class="text-danger ps-3"><?= $error['consent'] ?? '' ?></small>
                    </div>
                    <!-- ! validation btn -->
                    <div class="text-center pt-5 pt-lg-4 pb-5 w-100">
                        <button class="btn btn-primary signUp__btn" type="submit" name="captchaOk">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>