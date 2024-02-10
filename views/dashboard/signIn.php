<section class="container pt-5" id="signin__container">
    <div class="row pt-xl-4 justify-content-center">
        <div class="col-12 col-md-6 pt-3">
            <div class="card card__sign">
                <form method="POST" class="px-2">
                    <legend class="py-3 py-xl-4 px-3 text-center">Connexion</legend>
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
                        <div class="input-group pe-xl-3 ps-xl-3 px-1">
                            <label for="password"></label>
                            <span class="field__rsz input-group-text span__password"><i class="fa-solid fa-key"></i></span>
                            <input required type="password" name="password" id="password" placeholder="Mot de passe" class="form-control password__inputs" value="<?= $password ?? '' ?>" pattern="<?= REGEX_PASSWORD ?>">
                            <span class="field__rsz input-group-text span__login__pwd--eye"><i class="fa-solid fa-eye" id="pwd-eye"></i><i class="fa-solid fa-eye-slash d-none" id="pwd-eye-slash"></i></span>
                        </div>
                        <small class="text-danger ps-3"><?= $error['password'] ?? '' ?></small>
                    </div>
                    <div class="text-center py-5 w-100">
                        <button class="btn btn-primary signUp__btn" type="submit">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>