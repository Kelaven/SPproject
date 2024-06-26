<section class="container pt-3 pt-md-5" id="signin__container">
    <div class="row pt-xl-2 justify-content-center">
        <div class="col-12 col-md-6 pt-3">
            <div class="card card__sign">
                <form method="POST" class="px-2">
                    <h1 class="py-3 py-xl-4 px-3 text-center contact__legend w-100">Connexion</h1>
                    <div class="text-success text-center fs-6 fw-bold pb-3">
                        <?= $result ?? '' ?>
                    </div>
                    <div class="form__login--container">
                        <div class="input-group pe-xl-3 ps-xl-3 px-1">
                            <label for="email"></label>
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input required type="email" name="email" id="email" placeholder="Adresse mail" class="form-control" value="<?= $email ?? '' ?>">
                        </div>
                        <small class="text-danger ps-3"><?= $error['email'] ?? '' ?></small>
                        <div class="input-group pe-xl-3 ps-xl-3 px-1 pt-xxl-1">
                            <label for="password"></label>
                            <span class="field__rsz input-group-text span__password"><i class="fa-solid fa-key"></i></span>
                            <input required type="password" name="password" id="password" placeholder="Mot de passe" class="form-control password__inputs" value="<?= $password ?? '' ?>" pattern="<?= REGEX_PASSWORD ?>" autocomplete="current-password">
                            <span class="field__rsz input-group-text span__login__pwd--eye"><i class="fa-solid fa-eye" id="pwd-eye"></i><i class="fa-solid fa-eye-slash d-none" id="pwd-eye-slash"></i></span>
                        </div>
                        <small class="text-danger ps-3"><?= $error['password'] ?? '' ?></small>
                        <!-- ! Google captcha -->
                        <div class="g-recaptcha ps-xl-3 d-flex justify-content-center" data-sitekey="6LdiXXkpAAAAAGMkQYRUBp8-4qEEx_E5v5yNHzbl"></div>
                        <small class="text-danger ps-3 d-flex justify-content-center"><?= $error['captcha'] ?? '' ?></small>
                    </div>
                    <div class="text-center py-5 w-100">
                        <button class="btn btn-primary signUp__btn" type="submit" name="captchaOk">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
