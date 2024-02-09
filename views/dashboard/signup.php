<!-- form pour ajouter un nouveau client : ID, PWD, confirmation PWD -->
<section class="container" id="signup__container">
    <div class="row pt-4 justify-content-center" id="signup__row">
        <div class="col-12 col-lg-8 pt-5">
            <div class="card">
                <form method="POST" class="px-2" novalidate>
                    <legend class="py-4 px-3 text-center">Créer un compte</legend>
                    <div class="text-success text-center fs-6 fw-bold pb-3">
                        <?= $result ?? '' ?>
                    </div>
                    <div class="text-danger text-center">
                        <?= $error['exist'] ?? '' ?>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form__signup--left col-lg-6">
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
                            <!-- ! mobile -->
                            <div class="input-group pe-xl-3 ps-xl-3 px-1">
                                <label for="mobile"></label>
                                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                <input required type="text" name="mobile" id="mobile" placeholder="Numéro de téléphone" class="form-control" value="<?= $mobile ?? '' ?>">
                            </div>
                            <small class="text-danger ps-3"><?= $error['mobile'] ?? '' ?></small>
                        </div>
                        <div class="form__signup--right col-lg-6">
                            <!-- ! username -->
                            <div class="input-group pe-xl-3 ps-xl-3 px-1">
                                <label for="username"></label>
                                <span class="input-group-text" id="span__username"><i class="fa-solid fa-user-plus"></i></span>
                                <input required type="text" name="username" id="username" placeholder="Pseudonyme" autocomplete="given-name" minlength="2" maxlength="30" class="form-control" value="<?= $username ?? '' ?>">
                            </div>
                            <small class="text-danger ps-3"><?= $error['username'] ?? '' ?></small>
                            <!-- ! password -->
                            <div class="input-group pe-xl-3 ps-xl-3 px-1">
                                </label>
                                <span class="field__rsz input-group-text span__password"><i class="fa-solid fa-key"></i></span>
                                <input required type="password" name="password" id="password" placeholder="Mot de passe" autocomplete="given-name" minlength="8" maxlength="16" class="field__rsz form-control password__inputs" value="<?= $password ?? '' ?>" pattern="<?= REGEX_PASSWORD ?>">
                                <span class="input-group-text span__signup__pwd--eye"><i class="fa-solid fa-eye" id="pwd-eye"></i><i class="fa-solid fa-eye-slash d-none" id="pwd-eye-slash"></i></span>
                            </div>
                            <small class="text-danger ps-3"><?= $error['password'] ?? '' ?></small>
                            <!-- ! password check -->
                            <div class="input-group pe-xl-3 ps-xl-3 px-1">
                                <label for="passwordCheck">
                                </label>
                                <span class="field__rsz input-group-text span__password"><i class="fa-solid fa-key"></i></span>
                                <input required type="password" name="passwordCheck" id="passwordCheck" placeholder="Confirmez le mot de passe" autocomplete="given-name" minlength="8" maxlength="16" class="field__rsz form-control password__inputs" value="<?= $password ?? '' ?>" pattern="<?= REGEX_PASSWORD ?>">
                                <span class="input-group-text span__signup__pwd--eye"><i class="fa-solid fa-eye" id="pwd-eye-check"></i><i class="fa-solid fa-eye-slash d-none" id="pwd-eye-slash-check"></i></span>
                            </div>
                            <small class="text-danger ps-3"><?= $error['password'] ?? '' ?></small>
                            <!-- ! captcha -->
                            <div class="input-group pe-xl-3 ps-xl-3 px-1">
                                <label for="captcha"></label>
                                <span class="field__rsz input-group-text" id="span__captcha"><i class="fa-solid fa-robot"></i></span>
                                <input required type="number" name="captcha" id="captcha" placeholder="1 + 1 = ?" minlength="1" maxlength="1" class="field__rsz form-control" pattern="<?= REGEX_CAPTCHA ?>">
                            </div>
                            <small class="text-danger ps-3"><?= $error['captcha'] ?? '' ?></small>
                        </div>
                    </div>
                    <!-- ! validation btn -->
                    <div class="text-center pt-4 pb-5 w-100">
                        <button class="btn btn-primary signUp__btn" type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>